<template>
  <div class="login">
    <v-img class="align-center" :aspect-ratio="2.5" cover :src="app_url + bg_image">
      <v-card :loading="isUpdating" class="mx-auto pa-10" max-width="30%">
        <v-row>
          <v-col cols="12">
            <router-link to="/">
              <v-img class="mx-auto" width="45%" cover :src="app_url + logo" />
            </router-link>
          </v-col>
          <v-col cols="12" class="ps-0">
            <v-form>
              <v-container class="pt-0">
                <v-row class="pt-0 px-5 pb-5">
                  <v-col cols="12" class="text-center text-uppercase pt-0">
                    <h3>Link Innova Properties.</h3>
                  </v-col>
                  <v-col cols="12" class="pb-0">
                    <v-text-field
                      label="Username"
                      placeholder="Enter your Username"
                      variant="outlined"
                    ></v-text-field>
                    <!-- <v-text-field
                      variant="outlined"
                      label="Username"
                      prepend-icon="mdi-1 mdi-account"
                    ></v-text-field> -->
                  </v-col>
                  <v-col cols="12" class="pb-0">
                    <v-text-field
                      label="Password"
                      placeholder="Enter your Password"
                      variant="outlined"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12" class="text-center fw-bold pb-0">
                    <v-btn color="black" size="large" class="px-10"
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
    bg_image: "/images/images-login/bg-login-link.png",
  }),
};
</script>
