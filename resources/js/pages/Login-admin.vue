<template>
  <div class="login">
    <v-img class="align-center" :aspect-ratio="2.5" cover :src="app_url + bg_image[0]">
      <div class="logo">
        <router-link to="/">
          <v-img class="mx-auto" width="10%" cover :src="app_url + logo" />
        </router-link>
      </div>
      <v-card :loading="isUpdating" class="mx-auto" max-width="45%">
        <v-row>
          <v-col lg="6" cols="12" class="px-0 hidden-md-and-down">
            <v-img cover height="100%" :src="app_url + bg_image[1]"></v-img>
          </v-col>
          <v-col lg="6" cols="12" class="ps-0">
            <v-form>
              <v-container>
                <v-row class="pa-5">
                  <v-col cols="12" class="text-center text-uppercase">
                    <h1 class="mt-0 pt-0">Please Login</h1>
                    <p>Link Innova Properties Website Management.</p>
                  </v-col>
                  <v-col cols="12" class="">
                    <v-text-field
                      label="Username"
                      placeholder="Enter your Username"
                      variant="outlined"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="">
                    <v-text-field
                      label="Password"
                      placeholder="Enter your Password"
                      variant="outlined"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="text-center fw-bold mt-5">
                    <v-btn :href="app_url+'/Dashboard'" color="black" size="large" class="px-10"
                      ><strong>Login</strong></v-btn
                    >
                  </v-col>
                </v-row>
              </v-container>
            </v-form>
          </v-col>
        </v-row>
      </v-card>
    </v-img>
  </div>
</template>

<script>
export default {
  data: () => ({
    logo: "/images/logo.png",
    bg_image: [
      "/images/images-login/bg-login-admin.png",
      "/images/images-login/images-login.png",
    ],
  }),
};
</script>
