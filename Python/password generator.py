import string
import random

characters =list( string.ascii_letters + string.digits + "!@#$%")

def generate():
    passwrod_length = int(input('How long would you like your password to be? '))

    random.shuffle(characters)

    password = []

    for x in range(passwrod_length):
        password.append(random.choice(characters))

    random.shuffle(password)

    password = "".join(password)
    print(password)

option = input("Do you want to generate a password? (yes/no)")

if option.lower() == "yes":
    generate()
elif option.lower() == "no":
    print("Program ended")
    quit()
else:
    print("Invalid input. Input yes or no")
    quit()
