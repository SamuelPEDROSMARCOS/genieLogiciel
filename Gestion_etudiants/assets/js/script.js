// Validation du formulaire d'ajout
const form = document.getElementById('formEtudiant');
if (form) {
    form.addEventListener('submit', function(e) {
        const nom = document.querySelector('[name="nom"]').value.trim();
        const prenom = document.querySelector('[name="prenom"]').value.trim();

        if (nom === '' || prenom === '') {
            e.preventDefault();
            alert('Veuillez remplir tous les champs !');
        }
    });
}

// Confirmation de suppression
const deleteLinks = document.querySelectorAll('.btn-supprimer');
deleteLinks.forEach(btn => {
    btn.addEventListener('click', function(e) {
        if (!confirm('Voulez-vous vraiment supprimer cet étudiant ?')) {
            e.preventDefault();
        }
    });
});