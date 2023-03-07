import urllib.request as urlib

print("This is a site connectivity checker program")
input_url = input("Input the url of the site: ")

def main(url):
    print("Checking connectivity ")
    response = urlib.urlopen(url)
    print("Connceted to ", url , " succesfully")
    print("The response code was ", response.getcode())

main(input_url)