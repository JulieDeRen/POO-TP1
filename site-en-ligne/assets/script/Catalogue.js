export default class Catalogue {
    #aOeuvres;
    #domParent;

    constructor(domParent) {
        this.#domParent = domParent;
        //console.log(domParent)
    }

    setOeuvres(data) {
        this.#aOeuvres = data;
    }

    rendu() {
        let chaineHtml = "";
        this.#aOeuvres.forEach(uneOeuvre => {
            // Titre -> gérer l'affichage 
            let titre = uneOeuvre.Titre;
            let titreVariante = uneOeuvre.TitreVariante;
            let img = uneOeuvre.Img;
            let dateFin = uneOeuvre.DateFinEnchere;
            let prix = uneOeuvre.Prix;

            // Affichage de titre retirer Non titré et la parenthèses
            titre = titre.replace("Non titré ", "").replace("(", "").replace(")", "");

            // Si les deux titres sont identiques afficher seulement le titre
            if(titre===titreVariante){
                titreVariante="";
            }
            // Si la valeur est nulle remplacer par une chaîne vide
            if(!titreVariante){
                titreVariante = "";
            }
            // Sinon ajouter "ou bien " avant l'affichage du titre variant pour les séparer
            else{
                titreVariante = `<span class="titreVarianteOptionnel">ou bien </span>
                                <br>${titreVariante}`;
            }

            chaineHtml += `<article class = "flexVertical carte">
                                <img src=${img} alt="Timbre">
                                <div>
                                    <header>
                                        <h2>${titre}</h2>
                                    </header>
                                    <section>
                                        <h3>Date de fin : ${dateFin}</h3>
                                        <h3>Prix : ${prix}</h3>
                                        <div class="bouton-carte">
                                            <button class = "bouton-encherir">Enchérir</button>
                                            <img src="assets/img/icone/information.png" class="icone" alt="Information">
                                        </div>
                                    </section>
                                </div>
                            </article>`;

        });
        // Afficher dans le dom au point d'insertion
        this.#domParent.innerHTML = chaineHtml;
    }


}

/**!SECTION
 * <div class="mapouter">
                                    <div class="gmap_canvas">
                                        <iframe width="200" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=4722%20Ontario,%20Montreal&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                        </iframe>
                                        <a href="https://123movies-to.org"></a>
                                        <br>
                                        <style>.mapouter{position:relative;text-align:right;height:200px;width:200px;}</style>
                                        <a href="https://www.embedgooglemap.net">
                                        </a>
                                        <style>.gmap_canvas {overflow:hidden;background:none!important;height:200px;width:200px;}</style>
                                    </div>
                                </div>
 */