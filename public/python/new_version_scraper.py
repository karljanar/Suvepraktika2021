import requests
from bs4 import BeautifulSoup

def Drupal():
    url = "https://en.wikipedia.org/wiki/Drupal"
    page = requests.get(url)
    soup = BeautifulSoup(page.content, "html.parser")
    results = soup.find(class_="wikitable floatright")
    query = results.find_all(class_="templateVersion c")

    for version in query:
        currentVersion = ""
        chars = "123456789."
        text = version.text
        for i in text:
            if i in chars:
                currentVersion += i

    print(currentVersion)

Drupal()
print("7")
print("8")
print("3")
print("4")
def Wordpress():

    url = "https://en.wikipedia.org/wiki/WordPress"
    page = requests.get(url)
    soup = BeautifulSoup(page.content, "html.parser")
    query = soup.find_all(class_="templateVersion c")

    for version in query:
        currentVer = ""
        chars = "123456789."
        text = version.text
        for i in text:
            if i in chars:
                currentVer += i

    print(currentVer)

Wordpress()
print("1")
