import nltk
import re 
import sys

def separaPalavras(texto):    
    stop = nltk.corpus.stopwords.words('portuguese')
    #biblioteca com lista de palavras ditas stopwords     
    splitter = re.compile('\\W+')
    #pega apenas palavras, retirando caracteres que não sejam (diminui a numerosidade)    
    stemmer = nltk.stem.RSLPStemmer()
    #biblioteca que extrai o radical das palavras (diminui a dimensionalidade)    
    lista_palavras = []
    lista = [p for p in splitter.split(texto) if p != ' ']
    #percorre todas as palavras de um texto e quebra as palavras desconsiderando os espaços vazios !=' '
    for p in lista:
        if p.lower() not in stop:
        #não insere na lista palavras ditas stopwords
            if len(p) > 1:
            #retira palavras com 1 caracter    
                lista_palavras.append(stemmer.stem(p).lower())
                #carrega os radicais da palavras na lista 
    return lista_palavras

args = sys.argv[1:]
text = ""
for a in args:
    text = text + " " + a
palavras = separaPalavras (text)
for p in palavras:
    print (p)
