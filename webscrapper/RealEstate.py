import requests
import sqlite3

from bs4 import BeautifulSoup
from sqlite3 import Error

class RealEstate():

	global TABLES
	TABLES = {}


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

	def create_connection(db_file):
		print("Connecting...")
		
		try:
			cnx = sqlite3.connect(db_file)
			return cnx
		except Error as e:
			print(e)

		return None

	def close_connection(cnx):
		cnx.close()
		print('Connection Closed')


	def create_table(cnx, table):
		sql = """CREATE TABLE IF NOT  EXISTS {table_name} (
		address text,
		description text,
		sale_price text,
		details text,
		photo text,
		PRIMARY KEY(address)
		);""".format(table_name=table)

		cursor = cnx.cursor()
		cursor.execute(sql)

	def clear_table(cnx, table):
		sql = "DELETE FROM {table_name}".format(table_name=table)
		cursor = cnx.cursor()

		cursor.execute(sql)
		cnx.commit()


	def main():

		RealEstate.get_suburbs()
		cnx = RealEstate.create_connection('database.db')

		RealEstate.create_table(cnx, 'barfoot')

		#RealEstate.clear_table(cnx, 'barfoot')

		cursor = cnx.cursor()
		cursor.execute("SELECT * FROM barfoot")

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

			
				sql = """INSERT OR IGNORE INTO barfoot(
				address, description, sale_price, details, photo) 
				VALUES("{address}", "{description}", "{sale_price}", "{details}", "{photo}")
				;""".format(address=address_data,description=description_data,sale_price=sale_data,details=details_data, photo=image)

				cursor.execute(sql)

			index += 1
		cnx.commit()


if __name__ == '__main__':
	RealEstate.main()

