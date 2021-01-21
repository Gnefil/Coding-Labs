from tkinter import Tk, PhotoImage, Label, Button, messagebox

def create_buttons():
	j = -1
	for i in range(len(square)):
		square[i] = Button(window, image= available_space, width="100", height="100", command=lambda i=i :handle_button_click(i))
		if (i%3 == 0):
			j += 1
			print(str(i))
		square[i].place(x = j*100, y = (i%3)*100)
		print("square "+str(i)+" placed in " + str(i%3) +" and " + str(j))



# def create_buttons():
# 	square[0] = Button(window, image= available_space, width="100", height="100", command=lambda:handle_button_click(0))
# 	square[0].place(x = (0), y = 0)
# 	square[1] = Button(window, image= available_space, width="100", height="100", command=lambda:handle_button_click(1))
# 	square[1].place(x = (0), y = 100)
# 	square[2] = Button(window, image= available_space, width="100", height="100", command=lambda:handle_button_click(2))
# 	square[2].place(x = (0), y = 200)
# 	square[3] = Button(window, image= available_space, width="100", height="100", command=lambda:handle_button_click(3))
# 	square[3].place(x = (100), y = 0)
# 	square[4] = Button(window, image= available_space, width="100", height="100", command=lambda:handle_button_click(4))
# 	square[4].place(x = (100), y = 100)
# 	square[5] = Button(window, image= available_space, width="100", height="100", command=lambda:handle_button_click(5))
# 	square[5].place(x = (100), y = 200)
# 	square[6] = Button(window, image= available_space, width="100", height="100", command=lambda:handle_button_click(6))
# 	square[6].place(x = (200), y = 0)
# 	square[7] = Button(window, image= available_space, width="100", height="100", command=lambda:handle_button_click(7))
# 	square[7].place(x = (200), y = 100)
# 	square[8] = Button(window, image= available_space, width="100", height="100", command=lambda:handle_button_click(8))
# 	square[8].place(x = (200), y = 200)

def handle_button_click(button_number):
	print("Button ", button_number, " was clicked.")
	global counter
	if (counter%2 == 0):
		square[button_number].config(image=player1_taken, command=square_taken)
		update_move(button_number, 1)
	else:
		square[button_number].config(image=player2_taken, command=square_taken)
		update_move(button_number, 2)
	counter += 1

def square_taken():
	messagebox.showinfo("Square Taken", "Square already taken choose another!")

def update_move(square_number, player_number):
	square_to_oxo_map = [[0, 0], [0, 1], [0, 2], [1, 0], [1, 1], [1, 2], [2, 0], [2, 1], [2, 2]]
	m = square_to_oxo_map
	p = player_number
	s = square_number

	oxo[m[s][0]][m[s][1]] = p

	check_win()

def check_win():
	won = []
	won.append(oxo[0][0] == oxo[1][1] == oxo[2][2] and oxo[0][0] != ' ')
	won.append(oxo[0][2] == oxo[1][1] == oxo[2][2] and oxo[2][0] != ' ')
	for row in range(3):
		won.append(oxo[row][0] == oxo[row][1] == oxo[row][2] and oxo[row][0] != ' ')
	for col in range(3):
		won.append(oxo[0][col] == oxo[1][col] == oxo[2][col] and oxo[0][col] != ' ')
	if True in won:
		button = Button(window, image = winner, width="300", height="100")
		button.pack()




window = Tk()
window.geometry("300x300")
window.title("Noughts and Crosses")

available_space = PhotoImage(file="myButton.png")
player1_taken = PhotoImage(file="myButtonP1.png")
player2_taken = PhotoImage(file="myButtonP2.png")
winner = PhotoImage(file="winner.png")

square = [None]*9

create_buttons()

counter = 0

oxo = [[" " for j in range(3)] for i in range(3)]
print(oxo)

window.mainloop()