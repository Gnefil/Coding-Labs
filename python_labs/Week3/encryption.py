#Encryption Program
plainText = str(input("Please enter the text willing to encrypt: "))
cipherText = ""
alphabet = "XYZABCDEFGHIJKLMNOPQRSTUVWXYZABC"
plaintextPosition = 0
while (plaintextPosition < len(plainText)):
	plaintextChar = plainText[plaintextPosition]
	alphabetPosition = 3
	while (plaintextChar != alphabet[alphabetPosition]):
		alphabetPosition += 1
	alphabetPosition = alphabetPosition -3
	cipherText = cipherText + alphabet[alphabetPosition]
	plaintextPosition += 1
print ("The corresponding encrypted text should be : " + cipherText)
