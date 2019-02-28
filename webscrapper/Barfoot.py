
import requests

from bs4 import BeautifulSoup
from House import House

class Barfoot:

	global houseList
	houseList = []

	def get_suburbs():
		global suburbs
		suburbs = []
		with open("suburbs.txt") as s:
			for line in s:
				suburbs.append(line)

		index = 0
		while index < len(suburbs):
			suburbs[index] = suburbs[index].strip()
			index += 1

	def startScraping():

		Barfoot.get_suburbs()

		index = 0
		url = "https://www.barfoot.co.nz/search.aspx?searchmode=residential&suburb="
		while index < len(suburbs):
			capSuburb = suburbs[index].capitalize()
			r = requests.get(url + suburbs[index])

			soup = BeautifulSoup(r.content,"html.parser")
			containers = soup.findAll("div",{"class":"col-md-4 col-sm-6 col-xs-12 div-cell"})

			for container in containers:
				description_data = container.a.div.img.get("alt")
				address_container = container.findAll("div",{"class":"address"})
				address_data = address_container[0].text
				sale_container = container.findAll("div",{"class":"method-of-sale"})
				sale_data = sale_container[0].text
				details_container = container.findAll("div",{"class":"details"})
				details_data = details_container[0].text

				image = container.find('img')['src']

				houseList.append(House(address_data, description_data, sale_data, details_data, image))

				print(houseList)


			index += 1

if __name__ == '__main__':
	Barfoot.startScraping()

