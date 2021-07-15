## to watch
https://vimeo.com/345918897


# C'est un "set" de principe à utiliser ensemble

Cela signifie : "Open for extension, closed for modifications.."

Ce qu'il faut comprendre dans notre cas, c'est qu'une fois une classe implémentée, modifier cette classe est un risque
de regréssion. En ce sens, une classe fourre-tout qui évolue a chaque mise à jour est un risque fort.

Open/close principle est un principe qui autorise une classe à être étendue mais fermée à la modification.

Du coup pour implémenter ce principe, nous devons isoler dans des classes chaque composant ayant des comportements
différents malgré leur ressemblance.

Couplé au single responsability pattern (Une seule raison d'évoluer), OCP permet de livrer du code plus simplement

Voir l'exemple sur les méthodes de paiement.
