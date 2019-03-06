from PIL import Image
import numpy as np

#xor the last 4 bit so the typical method of decoding give weird result

#xor is the only(is it?) reversible bitwise operation 
#other operation like +-*/&| either inc/dec bitlength / are not reversible

def xor(x, y):
	return '{0:04b}'.format(int(x, 2) ^ int(y, 2))

def inv(i):
	new = ""
	for a in i:
		new += "1" if a=="0" else "0"
	return new

def computepixel(l1, l2):
	new = []
	for i in range(len(l1)):
		new.append(int(toBin(l1[i])[:4] + inv(xor(toBin(l1[i])[:4], toBin(l2[i])[:4])), 2))

	return tuple(new)

def decodepixel(p):
	new = []
	for i in range(len(p)):
		b = toBin(p[i])
		new.append(int(xor(b[:4], inv(b[4:])) + "0000", 2))
	return tuple(new)

def toBin(i):
	return "{0:08b}".format(i)

def encode(img1, img2):

	#img1 0123 4567
	#img2 abcd efgh

	#out 0123 abcd^0123


	#input(:4) + input(:4)^hidden(:4)
	out = Image.open(img1).copy()
	img1 = np.array(Image.open(img1))
	img2 = np.array(Image.open(img2))

	for i in range(img1.shape[0]):
		for j in range(img1.shape[1]):
			out.putpixel((j, i), computepixel(img1[i][j], img2[i][j]))
			print('encoding: {:.1%}'.format((i*img1.shape[1]+j)/(img1.shape[0]*img1.shape[1])))

	out.show()
	out.save('out.png')

	return out

def decode(img):

	#out 0123 (abcd^0123)
	#decode 0123 ^ (abcd^0123) => abcd
	#output: abcd 0000

	out = Image.open(img).copy()

	img = np.array(Image.open(img))

	for i in range(img.shape[0]):
		for j in range(img.shape[1]):
			out.putpixel((j, i), decodepixel(img[i][j]))
			print('decoding: {:.1%}'.format((i*img.shape[1]+j)/(img.shape[0]*img.shape[1])))

	out.save('decode.png')
	out.show()


	out = np.array(Image.open('decode.png'))

	return out

def gethalf(p):
	new = []
	for i in p:
		new.append(int(toBin(i)[:4] + "0000", 2))

	return tuple(new)
def half(img):
	out = Image.open(img).copy()

	img = np.array(Image.open(img))

	for i in range(img.shape[0]):
		for j in range(img.shape[1]):
			out.putpixel((j, i), gethalf(img[i][j]))
			print('{:.1%}'.format((i*img.shape[1]+j)/(img.shape[0]*img.shape[1])))

	out.show()

	return out

encode('aquaman.jpg', 'me.jpg')
# half('me.jpg')
# encode('xor.jpg', 'me.jpg')
decode('out.png')