# Introduzione
Il progetto prevede un sistema di registrazione, di verifica dell'email e di login tramite apposito pin segreto inviato per email.
Una volta autenticato tramite pin (che è possibile anche recuperare), si può votare selezionando il partito e fino a due candidati preferiti.
Non è possibile effettuare il voto più di una volta.
Successivamente al voto, si viene reindirizzati alla pagina del risultati, che per questioni di praticità sono sempre accessibili, e quindi aggiornabili in tempo reale man mano che gli utenti aggiungono il proprio voto.
Il codice è stato pensato per funzionare con php 8.0 e CodeIgniter 4

# Framework: CodeIgniter 4 (documentazione: https://codeigniter.com/user_guide/intro/index.html)
Il framework in questione permette di automatizzare una serie di tasks e di conseguenza organizzare il codice in modo tale da essere facilmente aggiornabile.
E' basato sul modello MVC (Model View Controller), che prevede principalmente quattro attori:
- Router: tutte le richieste vengono coinciliate in /public/index.php tramite i file .htaccess, e una classe Router si occupa di richiamare il controller e metodo giusti;
- Model: nei modelli viene gestita tutta la logica applicativa, le interazioni col database e l'elaborazione dei dati.
- View: non sono altro che le pagine html visualizzabili dall'utente.
- Controller: si occupa di richiamare i modelli necessari per portare a termine le operazioni desiderate e di mostrare le view, passandogli gli eventuali dati elaborati dai modelli.
Più nello specifico sono presenti anche altri elementi che permettono una facile gestione dei filtri da applicare per specifiche routes, come, ad esempio, il controllo dell'esistenza di una sessione per poter accedere alla pagina del voto.

# Cartelle e files principali
- All'interno della root del sito il file .env contiene tutte le credenziali e settaggi personalizzati per il funzionamento del sito. Il file in questione è escluso da ogni sistema di version control all'interno del file .gitignore, per questo ogni utente che desideri utilizzare una versione locale di questo progetto deve necessariamente rinominare il file "env" (aggiungedo un punto come prefisso) e di conseguenza inserire i propri dati.
- All'interno di /app/ sono di maggiore rilievo le cartelle Config/, Controllers/, Filters/, Libraries/, Models/, Views/ e Validation/. In Config/Routes.php sono definiti i vari percorsi visitabili nel sito, in Config/Validation.php sono presenti le varie regole di validazione per la creazione di un account, login e votazione. Libraries/ contiene il codice utile per la visualizzazione di "view cells" (elementi html ripetuti per molte pagine, e quindi separabili in files più piccoli), come l'header e il footer, e il codice per la generazione di un pin unico e casuale.
- in /public/, oltre all'unico index.php che gestisce tutte le richieste, contiene la cartella assets/ per tutti quegli elementi secondari come immagini, fogli di stile... (in questo caso è solo presente il file da includere tramite jQuery per la selezione dei candidati nella pagina del voto).

# jQuery
La parte realizzata con jQuery è stata pensata per mostrare la lista dei candidati disponibile per un partito solo dopo che se ne seleziona uno, ed evitare che l'utente selezioni lo stesso candidato per entrambe le preferenze nella pagina del voto.
La view contentente il codice jQuery si trova in app/Views/voting/Vote.php.