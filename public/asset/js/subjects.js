
class Subject{

    constructor(titre, auteur, date_creation, categorie, id){
        this.titre = titre;
        this.auteur = auteur;
        this.date_creation = date_creation;
        this.categorie = categorie;
        this.id = id;
    }   

}

async function getAllSubjects(nPage){

    let url = "http://localhost:8000/api/sujets?page"+nPage;

    let rep = await fetch(url);
    let response = await rep.json();

    let SubjectList = [];

    let object = response['hydra:member'].forEach(sujet => {           
        SubjectList.push(new Subject(sujet['nom'], sujet['auteur'], sujet['dateCreation'], sujet['categorie'], sujet['id']));
    });

    return SubjectList;

}

console.log(getAllSubjects(1))