def add(a, b):
    answer = a + b
    print(str(a) +" + "+ str(b) + " = " + str(answer))

def sub(a, b):
    answer = a - b
    print(str(a) + " - " + str(b) + " = " + str(answer))

def mul(a, b):
    answer = a * b
    print(str(a) +" * "+ str(b) + " = " + str(answer))

def div(a, b):
    answer = a / b
    print(str(a) +" / "+ str(b) + " = " + str(answer))

while True:
    print("A. addition\nB. subtraction\nC. multiplication\nD. divide\nE. exit")

    choice = input("input your choice \n")

    if choice == "A" or choice =="a":
        print("Addition")
        a = int(input("input first number: \n"))
        b = int(input("input second number: \n"))
        add(a,b)
    elif choice == "B" or choice == "b":
        print("subtraction")
        a = int(input("input first number: \n"))
        b = int(input("input second number: \n"))
        sub(a, b)
    elif choice == "C" or choice == "c":
        print("multiply")
        a = int(input("input first number: \n"))
        b = int(input("input second number: \n"))
        mul(a, b)
    elif choice == "D" or choice == "d":
        print("divide")
        a = int(input("input first number: \n"))
        b = int(input("input second number: \n"))
        div(a, b)
    elif choice == "E" or choice == "e":
        print("Program ended")
        quit()