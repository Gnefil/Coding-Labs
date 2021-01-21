#Decryption Program with ASCII Value
cipherText = str(input("Please enter the text willing to encrypt: "))
plainText= ""
ciphertextPosition = 0
while (ciphertextPosition < len(cipherText)):
	ciphertextChar = cipherText[ciphertextPosition]
	ASCIIValue = ord(ciphertextChar)
	ASCIIValue += 3
	plainText = plainText + chr(ASCIIValue)
	ciphertextPosition +=1
print ("The corresponding decrypted text should be : " + plainText)