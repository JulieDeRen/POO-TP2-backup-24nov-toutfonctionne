import {oeuvresPubliques} from "../data/oeuvresdonneesouvertes.js";
import Catalogue from "./Catalogue.js";
import Filtre from "./Filtre.js";
import Recherche from "./Recherche.js";

// Code débuté dans le cours de programmation d'interface II - Collège Maisonneuve
// Enseignant et auteur du code entamé : Jonathan Martel 

export default class Application{
    #oFiltre;
    #oCatalogue;
    #oRecherche;
    constructor(){
        // Traiter les données dans Application
        oeuvresPubliques.forEach((uneOeuvre)=>{
            if(uneOeuvre.DateFinProduction == null){
                uneOeuvre.DateFinProduction = "Date de production inconnue"
            }
            else{
                let finProduction = uneOeuvre.DateFinProduction;
                // Convertir en chaine de charactères
                finProduction = String(finProduction);
                // Enlever les charactères qui ne sont pas convertible en date
                finProduction = finProduction.substring(6).slice(0, -7);
                // Convertir en nombre
                finProduction = parseInt(finProduction);
                // Obtenir l'année
                finProduction = new Date(finProduction).getFullYear();
                // Reconvertir en chaine de charactère pour enregistrer dans l'objet
                uneOeuvre.DateFinProduction = String(finProduction);  
            }
            if(uneOeuvre.DateAccession == null){
                uneOeuvre.DateAccession = "Date de production inconnue"
            }
            else {
                let accession = uneOeuvre.DateAccession;
                // Convertir en chaine de charactères
                accession = String(accession);
                // Enlever les charactères qui ne sont pas convertible en date
                accession = accession.substring(6).slice(0, -7);
                // Convertir en nombre
                accession = parseInt(accession);
                // Obtenir l'année
                accession = new Date(accession).getFullYear();
                // Reconvertir en chaine de charactère pour enregistrer dans l'objet
                uneOeuvre.DateAccession = String(accession);  
            }
        });
        const domCatalogue = document.querySelector(".caroussel-portail");
        const accordeon = document.querySelector(".accordeon");
        const domListeCategorie = document.querySelector(".liste-categorie");
        const rechercher = document.querySelector(".bouton-rechercher");

        accordeon.addEventListener("click", this.ouvrirAccordeon.bind(this));
        domListeCategorie.addEventListener("click", this.appliquerFiltre.bind(this));
        rechercher.addEventListener("click", this.appliquerRecherche.bind(this));


        this.#oCatalogue = new Catalogue(domCatalogue);
        this.#oCatalogue.setOeuvres(oeuvresPubliques);
        this.#oCatalogue.rendu();
        
        this.#oFiltre = new Filtre(domListeCategorie);
        this.#oFiltre.setCategorie(oeuvresPubliques);
        this.#oFiltre.rendu();

        this.#oRecherche = new Recherche()
        this.#oRecherche.setRecherche(oeuvresPubliques);


    }
    ouvrirAccordeon(e){
        let cible = e.target; // ici c'est let puisque cible va peut-être devenir nextElementSiblig
        if(cible.classList.contains("menu-deroulant")){
            cible = cible.firstElementChild;
        }
        if(cible.innerText == "expand_more"){
            cible.innerText = "expand_less";
            cible.nextSibling.style.display = "none";
            //console.log(cible.nextSibling);

        }
        else if(cible.innerText == "expand_less"){
            //console.log("test expand_less")
            cible.innerText = "expand_more";
            cible.nextSibling.style.display = "block";
        }

    }

    // Traitement des données à envoyer en paramètre et affichage dans l'application
    appliquerFiltre(e){
        const cible = e.target;
        let dataFiltre = [];
        let filtreActif = [];
        let param = {};
        let resFiltreActif=[]
        if(cible.checked == true){
            cible.dataset.jsActif = 1;
            cible.setAttribute('checked', true);
        }
        else if(cible.checked == false){
            cible.dataset.jsActif = 0;
            cible.removeAttribute('checked');
        }
        // Aller chercher tous les filtres cochés actifs 
        filtreActif = document.querySelectorAll("[data-js-actif='1']");
        // Si aucun élément actif alors ne rien passer en paramètre de la fonction
        if(filtreActif.length == 0){
            dataFiltre = this.#oFiltre.appliquerFiltre();    
        }
        else{
            filtreActif.forEach((filtre)=>{
                param = {
                    cat: filtre.dataset.jsCat,
                    valeur : filtre.dataset.jsCatValeur
                };
                resFiltreActif.push(this.#oFiltre.appliquerFiltre(param));
            })
            // Concaténer les tables pour passer en paramètre seulement un tableau d'objet 
            // Source : https://stackoverflow.com/questions/10865025/merge-flatten-an-array-of-arrays
            dataFiltre = [].concat.apply([], resFiltreActif);
            // Pour ne pas afficher plusieurs fois la même oeuvre avec des filtres différents
            dataFiltre = [...(new Set(dataFiltre))]; 
        }
        this.#oCatalogue.setOeuvres(dataFiltre);
        this.#oCatalogue.rendu();
    }

    appliquerRecherche(e){
        this.#oRecherche.setRecherche(oeuvresPubliques);
        const champRecherche = document.querySelector("input[name='rechercher']").value;
        let dataRecherche = this.#oRecherche.appliquerRecherche(champRecherche);
        this.#oCatalogue.setOeuvres(dataRecherche);
        this.#oCatalogue.rendu();
    }
}

