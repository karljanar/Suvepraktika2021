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
        chars = "0123456789."
        text = version.text
        for i in text:
            if i in chars:
                currentVersion += i

    print(currentVersion)

    query = results.find_all(class_="templateVersion co")
    
    for version in query:
        currentVersion = ""
        chars = "0123456789."
        text = version.text
        for i in text:
            if i in chars:
                currentVersion += i
        print(currentVersion)


Drupal()


def Wordpress():

    url = "https://en.wikipedia.org/wiki/WordPress"
    page = requests.get(url)
    soup = BeautifulSoup(page.content, "html.parser")
    query = soup.find_all(class_="templateVersion c")

    for version in query:
        currentVer = ""
        chars = "0123456789."
        text = version.text
        for i in text:
            if i in chars:
                currentVer += i

    print(currentVer)

Wordpress()


def H5P():
    url = "https://h5p.org/h5p-release-history"

    page = requests.get(url)
    soup = BeautifulSoup(page.content, "html.parser")
    query = soup.findAll('tr')[1]

    currentVer = ""
    chars = "0123456789."
    text = query.text
    for i in text:
        if i in chars:
            currentVer += i

    print(currentVer)

H5P()

def Composer():
    url = "https://getcomposer.org/download/"

    page = requests.get(url)
    soup = BeautifulSoup(page.content, "html.parser")
    query = soup.find(class_='latest')

    currentVer = ""
    chars = "0123456789."
    text = query.text
    for i in text:
        if i in chars:
            currentVer += i

    print(currentVer)

Composer()

def Yii():
    url = "https://www.yiiframework.com/download"

    page = requests.get(url)
    soup = BeautifulSoup(page.content, "html.parser")
    query = soup.find(class_='content').findAll('li')[0].find('strong').text
    print(query)

    query = soup.find(class_='content').findAll('ul')[2].find('li').find('strong').text
    print(query)


Yii()


def October():
    url = "https://octobercms.com/changelog"

    page = requests.get(url)
    soup = BeautifulSoup(page.content, "html.parser")
    query = soup.find(class_='changelog october').findAll('th')
    #print(query.text)
    
    
    for version in query:
        currentVersion = ""
        chars = "0123456789."
        text = version.text.strip()
        text = text[1:]
        if(text[0] == "2"):
            for i in text:
                if i in chars:                          
                    currentVersion += i
            print(currentVersion)
            break

    for version in query:
        currentVersion = ""
        chars = "0123456789."
        text = version.text.strip()
        text = text[1:]
        if(text[0] == "1"):
            for i in text:
                if i in chars:                          
                    currentVersion += i
            print(currentVersion)
            break
        

October()


def LimeSurvey():
    url = "https://community.limesurvey.org/downloads/"

    page = requests.get(url)
    soup = BeautifulSoup(page.content, "html.parser")
    query = soup.find(class_='uk-h5 uk-margin uk-margin-remove-bottom uk-text-center')
    
    currentVer = ""
    chars = "0123456789."
    text = query.text
    for i in text:
        if i in chars:
            currentVer += i

    print(currentVer)

    query = soup.findAll(class_='uk-h5 uk-margin uk-margin-remove-bottom uk-text-center')[1]
    
    currentVer = ""
    chars = "0123456789."
    text = query.text
    for i in text:
        if i in chars:
            currentVer += i

    print(currentVer)

LimeSurvey()