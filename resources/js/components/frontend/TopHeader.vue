<template>
    <div class="row" >
          <div class="span4" style="background:blue; height:40px;">
            <div class="logo">
              <router-link to="/"><img src=" frontend/img/logo.png" alt="" class="logo" /></router-link>
              <h1>Flat and trendy bootstrap template</h1>
            </div>
          </div>
          <div class="span8" style="background:blue;">
            <div class="navbar navbar-static-top">
              <div class="navigation "  >
                <nav>
                  <ul class="nav topnav">
                    <li class="dropdown">
                      <router-link to="/"> Home </router-link>
                     </li>
                     <li class="dropdown">
                        <router-link to="/about"> About </router-link>
                       </li>


                  </ul>
                </nav>
              </div>
              <!-- end navigation -->
            </div>
          </div>
        </div>
</template>
<script>


export default {
     name: "TopHeader",
 
}
</script>

