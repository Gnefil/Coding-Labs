#Encryption Program using ASCII
plainText = str(input("Please enter the text willing to encrypt: "))
cipherText = ""
plaintextPosition = 0
while (plaintextPosition < len(plainText)):
	plaintextChar = plainText[plaintextPosition]
	ASCIIValue = ord(plaintextChar)
	ASCIIValue -= 3
	cipherText = cipherText + chr(ASCIIValue)
	plaintextPosition +=1
print ("The corresponding encrypted text should be : " + cipherText)
