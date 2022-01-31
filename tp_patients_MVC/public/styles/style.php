html,
body {
width: 100%;
height: 100%;
margin: 0;
padding: 0;
}

form {
display: flex;
flex-direction: column;
justify-content: center;
width: 20vw;
}

.red {
color: rgb(136, 36, 36);
font-weight: bold;
font-size: 1.5em;
}

.good {
color: green;
font-weight: bold;
}

.liste {
background-color: rgba(53, 109, 140, 0.809);
color: white;
font-weight: bold;
margin: 1vw;
padding: 1.5vh;
border-radius: 0.5em;
box-shadow: #5e5b5bcf 2px 4px 4px 0px;
border: 1px solid rgb(49, 95, 104);
}

.liste:hover {
background-color: rgb(49, 95, 104);
/* border: 1px solid rgb(145, 98, 88); */
}

input {
padding: 1.5vh;
border-radius: 0.5em;
border: none;
background-color: rgba(45, 82, 97, 0.378);
color: white;
}

::placeholder {
color: white;
}

[type="submit"] {
background-color: rgba(24, 94, 81, 0.864);
color: white;
border-radius: 0.5em;
border: 1px solid rgba(247, 142, 104, 0);
padding: 1.5vh;
}

[type="submit"]:hover {
background-color: rgba(33, 146, 126, 0.864);
border: 1px solid rgb(10, 52, 63);
}

button {
background-color: rgba(190, 206, 145, 0.522);
border: none;
border-radius: 0.5em;
padding: 0.8vh;
}

button:hover {
background-color: rgb(8, 43, 6);
color: white;
}

.cadre {
overflow-y: auto;
height: 70vh;
width: 80%;
}

th,
td {
width: 10%;
text-align: center;
}

th {
font-size: 1.3em;
color: rgb(27, 36, 29);
}

tr {
width: 60%;
margin-right: 20vw;
color: rgb(203, 223, 151);
font-weight: bold;
}

tr:hover {
color: rgb(8, 43, 6);
}

#lastname,
#firstname,
#birthdate,
#phone,
#mail {
margin-top: 0.5em;
}

.err {
color: rgb(136, 36, 36);
margin-left: 2vw;
font-size: 1.5em;
}

.rdv {
margin-left: 2vw;
color: rgb(174, 223, 174);
font-size: 1.5em;
}

#tout,
#ajoutPatient,
#listePatient,
#profilPatient,
#ajoutRdv,
#listeRdv,
#rdv,
#deletePatient {
width: 100%;
height: 100%;
background-image: url(./public/ressources/DSC_1680.JPG);
background-size: cover;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
}

.btn {
display: flex;
flex-direction: row;
justify-content: center;
align-items: center;
height: 5vh;
margin-top: 2vh;
}

.affichageIdP {
margin: 4vh 0;
}