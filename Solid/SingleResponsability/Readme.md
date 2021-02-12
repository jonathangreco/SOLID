# Single Responsability principle (SRP)

Le `S` de Solid. Solid est un Acronym de plusieurs principe dont le but est de nous aider à mieux architecturer des projets.
Le `S` de Solid signifie qu'une classe ne doit avoir qu'une seule responsabilité (Une seule raison de changer), c'est souvent mal compris car une seule raison de changer est souvent confondu avec : Il ne doit avoir qu'une seule responsabilité => il ne doit faire qu'une seule chose. Or ce n'est pas tout à fait vrai
La raison de changer dépends complètement du contexte et c'est ce que nous allons essayer d'expliquer ici.

## Comment respecter ce principe

- Construire des classes très petites, avec donc des objectifs limités (mais qui puisse faire plusieurs chose dans un contexte précis)

## Le but & les gains

- Forte cohésion et robustesse
- Permet de faire de la composition
- Evite le code dupliqué

# Explication du principe : Tell Don't Ask

Ce principe peut être défini comme suit : Il ne faut pas demander à un objet des informations sur son état et ensuite d'agir sur ces données, mais plutôt lui dire quoi faire.

Explications :
Demander à un objet à propos de son état, puis appelez les méthodes de cet objet à partir de décision définies en
dehors signifie que l'objet perd de sa cohésion car ses comportements sont dehors en plus d'avoir ses propriétés exposées.

Dans le controller on voir bien l'action qui récupère notre user à partir de la DB (on admet que le user est chargé dynamiquement)
Et le controlleur opère des décisions logique sur les valeurs des données du modèle directement.

Si la balance est supérieur au montant à payer alors on met à jour directement la balance.

## pourquoi c'est mauvais

- Car dans l'application on ne devrait avoir qu'un seul endroit dans le code qui permette de modifier un attribut du modèle.
  Or dans le controlleur qui est lié à une action particuliere, on pourrait avoir des cas de code dupliqué.
- Mais aussi parcequ'il est normal que des attributs soient encapsulé dans des objets qui veillent à ce que les règles métier soient appliqués.

Alors pourquoi ? pourquoi demander à des objet de "faire" quelque chose au lieu d'aller leur demander des informations et opérer les conditions nous mêmes dans le code applicatif ?
Quand on expose les détails et statuts des objets, comme on le fais deux fois dans `Solid\\SingleResponsability\\TellDontAsk\\Bad\\InvoiceController`
On couple très fortement le code applicatif et les getter/setter `balance` Si dans le futur on fait des changement dans la classe User
ces appels risque d'induire des scénarios de bugs
Typiquement si au lieu de soustraire des euros on décide d'internationaliser la balance, on doit passer dans tous les endroits ou
balance est redéfini (les appels au setter) pour appliquer cela, et ce sera pas simple.

## La bonne manière

En remplaçant dans le controlleur les tests sur les détails de l'entité User, on lui redirige la responsabilité de payer pour nous.
Ce n'est pas au controlleur d'effectuer les tests ou d'interagir avec les données.
la responsabilité d'un contrôleur est d'accepter une requete et de retourner une réponse.

Mais comme rien n'est simple en architecture il ne faut pas traiter ce principe Tell Dont Ask comme juste :
"Ajouter une méthode à un objet pour chaques opérations qui intervient sur son état" sinon on risque justement d'avoir une classe énorme qui violerait les principes SRP.
Et c'est là qu'on arrive à l'utilisation de transfère de responsabilité et des Values Object / DTO qui seront donc vue dans une autre formation.

## Exemple traité dans ce dépot : L'export de Document

## Pourquoi c'est mauvais

Comme vous pouvez le voir, les méthodes exposé par cette api incluent
`getTitle()` and the `getContent()`, mais ces méthodes sont utilisé
dans le comportement de cette même classe.

Cela casse le principe `Tell-Don't-Ask`. Il nous rappelle qu'au
lieu de demander des données à un objet et d'agir sur ces données,
nous devrions plutôt lui dire ce qu'il doit faire.

On peut aussi voir que la classe que doit représenter le document n'as pas
que la responsabilité de le représenter mais aussi d'exporter dans différent format. En gros il faut s'imaginer que Document est l'identique d'une entité, elle défini un type de donné mais pas son comportement au sein de l'application.

La responsabilité du Document est de présenter le document, définir son titre et exposer son contenu. Plus tard les évolutions possibles seraient de présenter la date de dernière mise à jour, ainsi que de **référencer** la personne qui est la source de cette modification.

Mais exporter un document n'est pas de la responsabilité de cet objet. C'est un autre objet qui doit prendre la responsabilité de cela, et de jouer sur la composition.

## Pourquoi c'est bon ?

Les plus sceptiques d'entre vous sur cet exemple pourraient
arguer que ça fait plus de code.

Et sur le fond je suis d'accord avec vous. Mais le gain compense largement.

Si on voyait les choses différemment :
Disons que notre code fonctionne et que le client demande un export par SMS.

On doit dans le cas de `Bad` modifier la seule classe `Document`, c'est rapide c'est identifié immédiatement \o/.
Mais la classe fait 400 lignes, probalement quelques conditions pour gérer les règles métier clients s'il y en as (je veux que l'export ne s'envoie que ...[met une règle chiante ici])

Et nous allons donc modifier cette classe qui va devenir énorme au fil du temps, gérer de plus en plus de cas, et
probablement nécéssiter une V2 rapidement tellement que plus personne n'y comprend rien. Ce genre de classe monolithique
ayant dépassé le stade de la responsabilité unique deviens un nid à problème en terme de debug et de gestion multi-cas.

Alors que dans le cas de `Good`, si on veut rajouter un export SMS, on ne modifie pas du code métier existant donc on limite les régressions, mais on en ajoute de nouvelles fonctionnalités.
Et on va juste modifier du code applicatif (la glue) pour gérer l'inclusion des classes métier.

D'autre part, pour ceux qui réalise des tests unitaires, c'est plus facile de tester de petites classes.

## Les limites

Il y en as, il faut les connaitre :

- SRP multiplie les classes, le défaut le plus courant des développeurs quand ils décomposent leur code en plus petites
  section est de nommer différement et explicitement ces nouvelles classes. Un mauvais nommage entraine souvent de la dette technique en terme de logique
- SRP induit la notion du principe Tell-Don't Ask, ce principe peut paraitre très contre-intuitif en raison de notre propension à coder en style procédural/objet. Et donc on pense facilement, puisqu'on en voit tous les jours, que du code qui agit sur des propriétés directement est la norme alors que c'est une mauvaise pratique
- Le principe TellDontAsk peut rentrer en conflit avec le SRP si mal conçu car :
  SRP demande à ce que les objets aient une seule raison de changer et limiter sa responsabilité au maximum
  TellDontAsk demande à déplacer les comportements au sein de la classe plutôt que de travailler sur ses propriétés en dehors
  On pourrai penser qu'il y a un conflit mais en fait tout est affaire de balance/contexte
