export default class Filtre{
    #domParent;
    #aData;
    #aCatFiltre =[{
        propriete :"DateFinEnchere",
        etiquette : "Date de fin d'enchère", 
        valeurs : []
    },
    {
        propriete :"Pays",
        etiquette : "Pays", 
        valeurs : []
    },
    {
        propriete :"Prix",
        etiquette : "Prix", 
        valeurs : []
    }];
    constructor(domParent){
        this.#domParent = domParent
    }

    setCategorie(data){
        
        this.#aData = data;
        this.#aCatFiltre.forEach((catFiltre)=>{
            let prop = catFiltre.propriete;
            let valeur = [];

            data.forEach(uneOeuvre => {
                valeur.push(uneOeuvre[prop]);
                if(uneOeuvre.prop == "DateAccession" || uneOeuvre.prop == "DateFinProduction"){
                    console.log("date ")
                }
            });
            valeur.sort();
               
            valeur = [...(new Set(valeur))];    // Avec l'opérateur de décomposition (spread operator)
            //console.log(valeur);
            catFiltre.valeurs = valeur;
        });
        // console.log(this.#aCatFiltre)
    }

    /**
     * Applique les filtres sur les données en fonction des paramètres
     * @param {Object} params 
     * @param {String} params.cat - La propriété à filtrer
     * @param {String | Number} params.valeur - La valeur du filtre
     * @return {Array} - Données filtrés
     */
    appliquerFiltre(params){
        let res = [];
        if(params == null){
            res = this.#aData;
        }
        else{ 
            let valeur = params.valeur;
            //console.log(valeur, "valeur");
            res = this.#aData.filter((unElement)=>{
                //console.log(unElement[params.cat],  "un élément params cat");
                // console.log(valeur, "valeur")
                return (unElement[params.cat] == valeur);
            })
        }
        return res;

    }

    rendu(){
        let chaineHTML = "";
        this.#aCatFiltre.forEach((uneCatFiltre)=>{
            // gérer l'affichage des filtres
            if(uneCatFiltre.propriete === "DateFinEnchere"){
                chaineHTML += `<div class="menu-deroulant">${uneCatFiltre.etiquette}
                <span class="material-symbols-outlined">expand_more
                </span><div style = "display: block" >`;
            }
            else{
                chaineHTML += `<div class="menu-deroulant">${uneCatFiltre.etiquette}
                <span class="material-symbols-outlined">expand_less
                </span><div style = "display: none" >`;
            }

                /*
                if(uneValeur >= 1800 && uneValeur <= 1849){
                    uneValeur = "1800 - 1849";

                }
                else if(uneValeur >= 1850 && uneValeur <= 1899){
                    uneValeur = "1850 - 1899";
                }
                else if(uneValeur >= 1900 && uneValeur <= 1949){
                    uneValeur = "1900 - 1949";
                }
                else if(uneValeur >= 1950 && uneValeur <= 1999){
                    uneValeur = "1950 - 1999";
                }
                else if(uneValeur >= 2000 && uneValeur <= new Date().getFullYear()){
                    uneValeur = "2000 - Aujourd'hui";
                }
                valeurs.filter(uneValeur)
            }*/

            uneCatFiltre.valeurs.forEach((uneValeur)=>{
                
                chaineHTML +=   `<li>
                                    <input type="checkbox" id="${uneValeur}" data-js-cat="${uneCatFiltre.propriete}" data-js-cat-valeur="${uneValeur}" data-js-actif="0" name="${uneValeur}">
                                    <label for="${uneValeur}">${uneValeur}</label>
                                </li>`
                    
            })
            chaineHTML += `</div></div>`;
        })
        

        this.#domParent.innerHTML = chaineHTML;
    }



}

/*

let catDate = {
                0: "1800 - 1849",
                1: "1850 - 1899",
                2: "1900 - 1949",
                3: "1950 - 1999",
                4: "2000 - Aujourd'hui"
            }


            const valeurs = (uneCatFiltre.valeurs);
            let res;
            if(uneCatFiltre.propriete === "DateFinProduction" || uneCatFiltre.propriete === "DateAccession"){
                res = (uneCatFiltre.valeurs).filter(function(uneValeur){
                    // console.log(uneValeur,  "un élément params cat");
                    // console.log(valeur, "valeur")
                    return (uneValeur >= 1800 && uneValeur <= 1849);
                })

            } 
            console.log(res);


            if(uneOeuvre.prop == "DateAccession" || uneOeuvre.prop == "DateFinProduction"){
                params.valeur = params.valeur.replace("\/Date(-", "").replace("-0500)\/", "").replace("-0400", "");
                console.log(params.valeur)
                params.valeur = new Date(parseInt(params.valeur).toUTCString());
            }
            console.log(params.valeur, "params.valeur") */