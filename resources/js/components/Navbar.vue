<template>
  <div class="nav-test container p-0">
    <div class="logo">
      <span class="name">SUP'PTIC</span>
    </div>
    <nav class="menu">
      <ul class="menu-list">
        <li class="dashboard"><router-link to="/dashboard"><font-awesome-icon icon="dashboard"/>  Tableau de bord</router-link></li>
        <li class="dashboard"><router-link to="/memoire"><font-awesome-icon icon="fa-solid fa-book-bookmark" />  Memoires</router-link></li>
        <li class="dashboard"><router-link to="/pfe"><font-awesome-icon icon="fa-solid fa-book-bookmark" />  PFE</router-link></li>
        <li class="dashboard"><router-link to="/card"><font-awesome-icon icon="fa-solid fa-user-tie" />  Administrateur</router-link></li>
        <hr/>
        <li class="dashboard"><router-link to="/Page5"><font-awesome-icon icon="gear"/>  Parametres</router-link></li>
        <li class="dashboard"><router-link to="/Page6"><font-awesome-icon icon="fa-solid fa-clock-rotate-left" />  Historique</router-link></li>
      </ul>
    </nav>
  </div>
</template>

<style scoped>

*{
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style: none;
}
hr{
  margin-top: 15px;
  margin-bottom: 15px;
}
.nav-test{
    height: 100vh;
    background-color: #363740;
}
.logo{
    padding-top: 10px;
    text-align: center;
    color: #ffffff;
    font-size: medium;
    margin-bottom: 30px;
}
.menu ul li a{
    padding-top: 8px;
    padding-left: 10px;
    height: 50px;
    width: 100%;
    margin-bottom: 0px;
}
.menu ul li a{
    display: block;
    font-size: 20px;
}

.menu ul li a:hover{
    padding-left: 15px;
    background-color: rgba(255, 255, 255, 0.1);
}

ul > li > a{
  color:rgba(255, 255, 255, 0.7)
}
.router-link-exact-active {
    background-color: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    border-left: #ffffff 3px solid;
}

</style>