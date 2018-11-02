    <style>
        header {
            text-align: center;
        }
        header h1 {

        }
        nav {
            background-color: #00000010;
        }
        ul {
            background-color: #ff8000;
            list-style: none;
            display: flex;
            flex-direction: column;
        }
        li a {
            position: relative;
            display: block;
            padding: 16px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
        }
        li a:hover {
            text-decoration: none;
            color: #ffffff;
            background-color: #183b75;
        }
        li ul {
            display: none;
        }
        li:hover ul {
            position: absolute;
            display: flex;
            flex-direction: column;
            padding-left: 0px;
            margin-left: 50px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.5);
            z-index: 1;
        }
    </style>
    <header>
        <h1>Catalogue des Films Marvel</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#Accueil">Accueil</a></li>
            <li>
                <a href="#Catalogue">Catalogue</a>
                <ul>
                    <li><a href="#Creation">Création</a></li>
                    <li><a href="#Suppression">Suppression</a></li>
                    <li><a href="#Modification">Modification</a></li>
                </ul>
            </li>
            <li>
                <a href="#Categories">Catégories</a>
                <ul>
                    <li><a href="#Heros">Héros</a></li>
                    <li><a href="#Teams">Teams</a></li>
                    <li><a href="#Ennemis">Les ennemis</a></li>
                </ul>
            </li>
            <li><a href="#Contact">Contact</a></li>
        </ul>  
    </nav>