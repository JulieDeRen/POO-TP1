export default class Recherche{
    #aData;

    setRecherche(data){ 
        this.#aData = data;
    }

    /**
     * Applique les Recherches sur les données en fonction des paramètres
     * @param {Object} params 
     * @param {String} params.cat - La propriété à Rechercher
     * @param {String | Number} params.valeur - La valeur du Recherche
     * @return {Array} - Données filtrés
     */
    appliquerRecherche(params){
        let res = [];
        console.log(params, "params recherche")
        if(params == ""){
            res = this.#aData;
            console.log("champ recherche nulle")
        }
        else{ 
            res = this.#aData.filter((unElement)=>{
                let texte = unElement.Titre + unElement.TitreVariante + unElement.DateFinProduction + unElement.DateAccession;
                // console.log(unElement[params.cat],  "un élément params cat");
                // console.log(valeur, "valeur")
                // console.log(unElement); chaque objet
                return (texte.toLowerCase().includes(params.toLowerCase()));
            })
        }
        console.log(res)
        return res;
    }


}
/*
this.#aData.forEach((unElement)=>{
    //  .normalize('NFD').replace(/\p{Diacritic}/gu, "") 
    //  -> Source : https://stackoverflow.com/questions/5700636/using-javascript-to-perform-text-matches-with-without-accented-characters
    const nomMaireUFD = maire.nom.toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu, "");
    const prenomMaireUFD = maire.prenom.toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu, "");
    const champTexteUFD = params.valeur.toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu, "");
    const tabChampTexteUFD = champTexteUFD.split(" ");
    for(let i = 0; i< tabChampTexteUFD.length; i++){
        if(nomMaireUFD.includes(tabChampTexteUFD[i])){
            tabRes.push(maire);
            // sortir de la boucle dès qu'on trouve un match
            i = tabChampTexteUFD.length;
        }
        else if(prenomMaireUFD.includes(tabChampTexteUFD[i])){
            tabRes.push(maire);
            i = tabChampTexteUFD.length;
        }
    };
});
return tabRes; */