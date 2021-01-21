import random

file = open("EnglishWords.txt", "r")
wordList = file.read().split()
file.close()


word = random.choice(wordList)
count = 0
win = False
guesses = ""
answer = ""

for x in range (0, len(word)):
	answer += "_"

while (count < (len(word)+5) and win == False):
	count = count + 1
	guess = input("Enter guess " + str(count) + ": ")
	guesses = guesses + guess
	tmp = ""
	i = 0

	while (i < len(word)):
		if (word[i] == guess):
			tmp = tmp + guess
		else:
			tmp = tmp + answer[i]
		i += 1
	if (answer != tmp):
		print("good guess")
		count = count - 1
		answer = tmp
	else:
		print("not a good guess")
	if (answer == word):
		print("Well done you win!")
		win = True
	print(str(10-count), "/10 guesses left.")
	print("your guesses: " + str(guesses))
	print("The word so far: " + str(answer) + "\n\n")