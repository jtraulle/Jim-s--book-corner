<?php
class inscription extends Module{

    public function action_index(){
        $this->set_title("S'inscrire | Jim's book corner library");

        $f=new Form("?module=inscription&action=valide","form1");
        $f->add_legend("leg1", "Informations personnelles");
        $f->add_select("civilite","civilite","Civilité",array("Monsieur","Madame","Mademoiselle"));
        $f->add_text(
            "nomEmprunteur",
            "nomEmprunteur",
            "Nom",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
        $f->add_text(
            "prenomEmprunteur",
            "prenomEmprunteur",
            "Prénom",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphabétique (accents autorisés)."
        );
        $f->add_text(
            "numRueEmprunteur",
            "numRueEmprunteur",
            "Numéro de rue",
            true,
            "numeric",
            "Vous devez saisir une nombre."
        );
        $f->add_text(
            "nomRueEmprunteur",
            "nomRueEmprunteur",
            "Nom de rue",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphanumérique (accents autorisés)"
        );
        $f->add_text(
            "villeEmprunteur",
            "villeEmprunteur",
            "Ville",
            true,
            "alphaNumAccentue",
            "Vous devez saisir une chaîne alphanumérique (accents autorisés)"
        );
        $f->add_text(
            "codePostalEmprunteur",
            "codePostalEmprunteur",
            "Code postal",
            true,
            "codepostal",
            "Vous devez saisir un code postal valide"
        );
        $f->add_endfieldset("endfieldset");
        $f->add_legend("leg2", "Informations de connexion au site");
        $f->add_text(
            "identifiantEmprunteur",
            "identifiantEmprunteur",
            "Identifiant",
            true,
            "identifiant",
            "Accents et caractères spéciaux interdits"
        );
        $f->add_password(
            "mdpEmprunteur",
            "mdpEmprunteur",
            "Mot de passe",
            true,
            "motdepasse",
            "Longueur minimale de 7 caractères (dont une majuscule et un chiffre)"
        );
        $f->add_endfieldset("endfieldset");
        $f->add_legend("leg3", "Restons en contact");
        $f->add_text(
            "telFixeEmprunteur",
            "telFixeEmprunteur",
            "Téléphone fixe",
            false,
            "telfixe",
            "Saisissez un numéro de téléphone fixe valide"
        );
        $f->add_text(
            "telPortableEmprunteur",
            "telPortableEmprunteur",
            "Téléphone portable",
            false,
            "telportable",
            "Saisissez un numéro de téléphone portable valide"
        );
        $f->add_text(
            "emailEmprunteur",
            "emailEmprunteur",
            "Email",
            false,
            "email",
            "Saisissez un email valide"
        );
        $f->add_endfieldset("endfieldset");
        $f->add_submit("sub","sub")->set_value("Créer le compte",'actions','btn btn-primary');

        $this->tpl->assign("form",$f);
        $this->session->form = $f;
    }

    public function action_valide(){

        $this->set_title("S'inscrire | Jim's book corner library");

        $form=$this->session->form;

        //Si l'utilisateur essaie de passer la validation directement
        //en tapant l'URL, on le redirige vers l'action index ;)
        if($_REQUEST['sub'] != 'Créer le compte')
            $this->site->redirect('inscription', 'index');

        if($form->validate())
        {
            if(Emprunteur::isIdentifiantDispo($this->req->identifiantEmprunteur)){
                $nouvelEmprunteur = new Emprunteur(
                    $this->req->nomEmprunteur,
                    $this->req->prenomEmprunteur,
                    $this->req->numRueEmprunteur,
                    $this->req->nomRueEmprunteur,
                    $this->req->villeEmprunteur,
                    $this->req->codePostalEmprunteur,
                    $this->req->identifiantEmprunteur,
                    $this->req->mdpEmprunteur,
                    $this->req->telFixeEmprunteur,
                    $this->req->telPortableEmprunteur,
                    $this->req->emailEmprunteur
                );

                $nouvelEmprunteur->enregistrer();

                $this->site->ajouter_message('Le nouvel emprunteur a été ajouté avec succès =)',4);
                $this->site->redirect('index');                
            } else {
                $this->site->ajouter_message('L\'identifiant que vous avez choisi est déjà utilisé !',1);
                $form->populate();
                $this->tpl->assign("form",$form);
            }            
        }else{
            $this->site->ajouter_message('Des erreurs ont été détectées durant la validation du formulaire. Veuillez corriger les erreurs mentionnées.',1);
            $form->populate();
            $this->tpl->assign("form",$form);
        }
    }
}
?>
