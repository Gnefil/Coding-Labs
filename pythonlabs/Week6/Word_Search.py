#Word Search Puzzle Game
import random

#global wordList
def create_words():
	"""A function that creates a list of the following words and return them"""

	global wordList 
	wordList = ["happy", "cheerful", "chipper", "effervescent", "jaunty", "jolly"]

	return wordList

#global userInputList
def user_input_words ():
	"""Get the words from the user and build the list that way. The user will enter a word and press enter, the word will be added to the list. The user will continually be asked for words until they just hit enter"""

	global userInputList
	userInputList = []

	print("Enter words until you don't want to")

	while True:

		userInput = input()
		userInput = str(userInput)

		if (userInput != ""):
			userInputList.append(userInput)
			continue

		return userInputList

def display_words (wordList):
	"""The function should output the values in the list called words."""
	print(wordList)
	return

#global grid, height and width
def generate_grid ():
	""" Generates the grid of the desired size """

	global grid, height, width
	height = int(input("Please enter desired height: "))
	width = int(input("Please enter desired width: "))

	# for i in range(height):
	# 	grid.append([])
	# 	for j in range(width):
	# 		grid[i].append("")

	grid = [["-" for i in range(width)] for j in range(height)]

	return grid

def display_grid(grid):
	"""Display the grid passed"""

	# for i in range(len(grid)):
	# 	print(grid[i])
	# return
	for row in range(height):
		for col in range(width):
			print (grid[row][col] + ' ', end="")
		print()
	return

#global canBePlaced
def place_word(word, row, column, direction):
	"""Place the words with the four parameters already defined in place_words"""

	global canBePlaced, placeWords
	canBePlaced = check_word_will_fit(word, row, column, direction)

	if canBePlaced:
		for charOfWord in range(len(word)):
			grid[row][column] =  word[charOfWord]

			if (direction == "toRig"):
				column += 1

			if (direction == "toLef"):
				column -= 1

			if (direction == "toBot"):
				row += 1

			if (direction == "toTop"):
				row -= 1

	placedWords.append(word)


#global direction, positionR, positionC
def place_words ():
	"""Randomly determine the direction and start position for each word."""

	global direction, positionR, positionC

	for word in wordList:
		if len(word) > height or len(word) > width:
			continue

		canBePlaced = False

		count = 0
		while not canBePlaced and count < 10:
			canBePlaced = True

			direction = random.choice(["toBot", "toTop", "toRig", "toLef"])

			if (direction == "toRig"):
				min = 0
				max = width - len(word)
			if (direction == "toLef"):
				min = len(word)-1
				max = width -1
			if (direction == "toBot"):
				min = 0
				max = height - len(word)
			if (direction == "toTop"):
				min = len(word) - 1
				max = height - 1

			if (direction in ("toRig", "toLef")):
				positionR = random.randint(0, width-1)
				positionC = random.randint(min, max)

			if (direction in ("toBot", "toTop")):
				positionC = random.randint(0, height-1)
				positionR = random.randint(min, max)

			place_word(word, positionR, positionC, direction)

			count+=1


	return

def check_word_will_fit (word, row, column, direction):
	"""Check if space is enough for the word"""

	for charOfWord in range(len(word)):
		if grid[row][column] == '-' or grid[row][column] == word[charOfWord]:

			if (direction == "toRig"):
				column += 1

			if (direction == "toLef"):
				column -= 1

			if (direction == "toBot"):
				row += 1

			if (direction == "toTop"):
				row -= 1
		else:
			return False
	return True

def random_fill ():
	"""Filling randomly letters into the grill"""

	alphabet = "qwertyuiopasdfghjklzxcvbnm"
	alphabet = list(alphabet)

	for row in range(height):
		for column in range (width):
			if grid[row][column] == "-":
				grid[row][column] = random.choice(alphabet)
	return


placedWords = []
create_words()
generate_grid()
place_words()

random_fill()
display_grid(grid)
display_words(placedWords)

