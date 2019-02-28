
class House(object):

	def __init__(self, address, description, sale_price, details, photo):
		self.address = address
		self.description = description
		self.sale_price = sale_price
		self.details = details
		self.photo = photo

	def getAddress(self):
		return self.address

	def getDescription(self):
		return self.description

	def getSalePrice(self):
		return self.sale_price

	def getDetails(self):
		return self.details

	def getPhoto(self):
		return self.photo
