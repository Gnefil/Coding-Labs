def get_choice():

    choice = input("Enter encrypt or decrypt: ")
    if choice[0] == 'e' or choice[0] == 'E':
        return -3
    else:
        return 3


def main():
    shift_value = get_choice()
    input_text = input('Input text:')
    do_conversion(input_text, shift_value)
    resulting_text = do_conversion(input_text, shift_value)
    textChoice = input('Write to file or display on screen')
    if (textChoice == 'w'):
        write_to_file(resulting_text)
    else:
        print(resulting_text)


def do_conversion(input_text, shift_value):
    resulting_text = ""
    input_text_position = 0
    while (input_text_position < len(input_text)):
        input_text_char = input_text[input_text_position]
        ASCIIValue = ord(input_text_char)
        ASCIIValue += shift_value
        resulting_text = resulting_text + chr(ASCIIValue)
        input_text_position += 1
    return resulting_text


def write_to_file(resulting_text):
    filename = input("Enter a filename:")
    fh = open(filename, "w")
    fh.write(resulting_text)


main()
