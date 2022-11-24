import {oeuvresPubliques} from "../data/oeuvresdonneesouvertes.js";
import Catalogue from "./Catalogue.mjs";
import Recherche from "./Recherche.mjs";

// Code débuté dans le cours de programmation d'interface II - Collège Maisonneuve
// Enseignant et auteur du code entamé : Jonathan Martel 

export default class ApplicationFiche{
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
        const domCarrouselFiche = document.querySelector(".carrousel-fiche");
        const rechercher = document.querySelector(".bouton-rechercher");

        rechercher.addEventListener("click", this.appliquerRecherche.bind(this));


        this.#oCatalogue = new Catalogue(domCarrouselFiche);
        this.#oCatalogue.setOeuvres(oeuvresPubliques);
        this.#oCatalogue.rendu();

        this.#oRecherche = new Recherche()
        this.#oRecherche.setRecherche(oeuvresPubliques);


    }
  

    appliquerRecherche(e){
        this.#oRecherche.setRecherche(oeuvresPubliques);
        const champRecherche = document.querySelector("input[name='rechercher']").value;
        let dataRecherche = this.#oRecherche.appliquerRecherche(champRecherche);
        this.#oCatalogue.setOeuvres(dataRecherche);
        this.#oCatalogue.rendu();
    }
}

