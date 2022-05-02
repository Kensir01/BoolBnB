# BoolBnB

# Passaggi da effettuare x inizializzare repo
1. composer create-project --prefer-dist laravel/laravel:^7.0 NOMEPROGETTO
2. php artisan serve
3. BOOTSTRAP: composer require laravel/ui:^2.4
4. php artisan ui bootstrap
5. VUE: php artisan ui vue --auth
6. npm install
7. npm run watch (per generare file css e js quando modifico)

## Passi da seguire per importare repo
1. Cloniamo la repo da GitHub 
2. Da terminale Composer install
3. Npm install
4. Copia il file .env ( da terminale inserisci cp .env.example .env )
5. Crea un nuovo DB in phpMyAdmin
6. Configura il file .env per DB e Mail (tramite mailtrap)
7. Ricrea l' App Key ( php artisan key:generate )
8. Cancella la cache delle impostazioni ( php artisan config:clear )
9. Lancia le migrazioni ( php artisan migrate )
10. Lancia i seeder ( php artisan db:seed se abbiamo un metodo definito nella
DatabaseSeeder.php oppure php artisan db:seed --class=NomeDelSeeder)
11. Crea il link da storage alla cartella public da terminale con php artisan storage:link
12. php artisan serve


## BRANCH
1. Apri su VsCode estensione GITGRAPH per tenere traccia delle commit 
2. branch principale -> main
3. --- branch -> create branch
4. Inserisci branch name ( in automatico ti sposta nel branch appena creato, le modifiche che ora farò, le farò sul mio branch e non su quello principale )
5. Con un click posso passare da un branch all'altro, andando sul branch e cliccando checkout branch

6. Voglio unire / fare merge delle modifiche fatte del mio nuovo branch e quello principale? 
7. Mi sposto sul branch principale -> main
8. Tasto dx su il nuovo branch creato -> click su merge
