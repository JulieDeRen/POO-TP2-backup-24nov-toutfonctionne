# POO-TP2

## Le mandat actuel consiste donc à développer la base de données pour soutenir la plateforme de programmer l’interface qui permet de saisir l’entrée de nouveaux clients.

### Tables :
Le modèle actuel propose sept tables. Pour être cohérente du début à la fin du modèle, toutes les informations dans la base de données sont rédigées en anglais. Voici une brève présentation de chacune avec leurs spécificités.

#### Client
La table client contient les informations relatives à chaque client. Il est à noter que la propriété courriel est unique. Deux clients ne peuvent avoir le même courriel. Cette situation empêche néanmoins un couple d’ouvrir deux comptes avec leur même courriel, mais en même temps permet au courriel d’être le « user name » de chaque utilisateur étant donné qu’il est unique. Les propriétés adresse, anniversaire et courriel ne sont pas requises
obligatoirement lors de la saisie d’un nouveau client dans la base de données. Le courriel et le mot de passe sont de type VARCHAR(255) pour permettre le maximum de charactères.

#### Timbre / Stamp
La table timbre contient les informations relatives à chaque timbre qui sont à vendre. La plupart des informations ne sont pas obligatoires. Toutefois, le nom, le prix, le format (individuel, lot, première édition, etc) et la condition (excellente, usager, etc.) sont des propriétés obligatoires. D’ailleurs, le format et la condition ont leur propre table étant donné que ces informations sont répétitives d’un timbre à l’autre.

#### Format
Le format inclut potentiellement une description du format pour expliquer la propriété et garder l’information en note.

#### Condition
La même chose s’applique à la condition, c’est-à- dire qu’il est possible d’ajouter une description à la condition pour expliquer une donnée saisie dans la condition.

#### Image
Un timbre peut avoir aucune ou plusieurs images, mais une image ne sera associée qu’à un seul timbre. Dans la table image, seul le chemin vers l’image est entrée dans la base de donnée qui est un champ VARCHAR(255). Il aurait été possible d’enregistrer l’image sous un format BLOB mais ça occupera plus de place dans la base de données que des données de type VARCHAR(255).

#### Pays / Country
La table pays est utilisée autant par les timbres que par les clients. Donc, il y a deux liens qui relient cette table à des tables externes. Un timbre peut appartenir à un seul pays et un pays peut correspondre à plusieurs timbres. Tout comme la relation entre cette table et la table client.

#### Timbre par client / Client_has_stamp
La table intermédiaire enregistre les timbres qui sont dans le panier de souhaits de chaque client. Le même timbre peut être dans plusieurs paniers
différents à la fois, puisqu’il n’a pas encore été acheté. Un timbre peut être dans zéro ou plusieurs paniers et un client peut avoir zéro ou plusieurs timbres dans son panier. Il est à noter que s’il n’y avait pas de panier ou bien si le modèle d’affaires de la compagnie ne permettait pas à un timbre d’être dans plusieurs paniers à la fois (ce qui constitue un risque financier), alors il n’y aurait pas cette table intermédiaire. Il y a un prix et une date de transaction, lorsque le timbre est acheté. Automatiquement la date de transaction entrée, elle retire le timbre des paniers d’autres clients qui auraient souhaité l’acheter.

## https://e2295160.webdev.cmaisonneuve.qc.ca/POO-TP2
