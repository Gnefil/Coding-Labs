#Decryption Program
cipherText = str(input("Please enter the cipher text willing to dencrypt: "))
plainText = ""
alphabet = "XYZABCDEFGHIJKLMNOPQRSTUVWXYZABC"
ciphertextPosition = 0
while (ciphertextPosition < len(cipherText)):
	ciphertextChar = cipherText[ciphertextPosition]
	alphabetPosition = 3
	while (ciphertextChar != alphabet[alphabetPosition]):
		alphabetPosition += 1
	alphabetPosition = alphabetPosition + 3
	plainText = plainText + alphabet[alphabetPosition]
	ciphertextPosition += 1
print ("The corresponding decrypted text should be : " + plainText)
