<template>
  <v-main>
    <v-row class="ma-1 news-activitie">
      <!-- dialogInsert -->
      <v-dialog v-model="dialoginsert" persistent width="auto">
        <template v-slot:activator="{ props }">
          <v-col cols="8" class="d-flex align-end">
            <v-btn color="#D50703" class="text-white" v-bind="props"
              ><i class="mdi mdi-text-box-plus-outline"></i>Insert
            </v-btn>
          </v-col>
        </template>
        <v-card>
          <v-toolbar
            class="text-center text-white"
            color="#D50703"
            title="INSERT INTO OUT PARTNER"
          ></v-toolbar>
          <v-card-text>
            <v-container>
              <v-row class="d-flex align-center">
                <v-col cols="2">
                  <v-list-subheader>Name : </v-list-subheader>
                </v-col>
                <v-col cols="10" sm="10" md="10">
                  <v-text-field variant="outlined" required></v-text-field>
                </v-col>
                <v-col cols="2">
                  <v-list-subheader>Website : </v-list-subheader>
                </v-col>
                <v-col cols="10" sm="10" md="10">
                  <v-text-field variant="outlined" required></v-text-field>
                </v-col>
                <v-col cols="2">
                  <v-list-subheader>Date Create : </v-list-subheader>
                </v-col>
                <v-col cols="10" sm="10" md="10">
                  <input type="date" name="date" />
                </v-col>
                <v-col
                  class="d-flex justify-center align-center fileinsert"
                  cols="12"
                  sm="12"
                  md="12"
                >
                  <label for="myImage"><i class="mdi mdi-image-plus-outline"></i></label>
                  <input
                    type="file"
                    id="myImage"
                    accept="image/png, image/gif, image/jpeg"
                  />
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions class="d-flex justify-center align-center">
            <v-btn color="#F9A825" @click="dialoginsert = false">
              <i class="fa-regular fa-xmark"></i>Cancle
            </v-btn>
            <v-btn color="#28A745" @click="dialoginsert = false">
              <i class="fa-light fa-floppy-disk"></i>Save
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <!-- dialogInsert END -->
      <v-col cols="3"
        ><v-text-field
          v-model="search"
          class="text-red"
          variant="underlined"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-col>
      <v-col cols="1" class="d-flex align-end">
        <i class="fa-solid fa-magnifying-glass iconsearch"></i>
      </v-col>
      <v-col cols="12">
        <v-card>
          <v-table>
            <thead>
              <tr>
                <th class="text-center" width="80px">No.</th>
                <th>Name</th>
                <th>Website</th>
                <th class="text-center" width="250px">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in desserts" :key="item.id">
                <td class="text-center">{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.website }}</td>
                <td class="text-center">
                  <v-btn variant="text" class="text-blue" @click="dialogview = true">
                    <i class="fa-solid fa-eye"></i>
                  </v-btn>

                  <v-btn
                    variant="text"
                    class="text-yellow-darken-3 mx-3"
                    @click="dialogedit = true"
                  >
                    <i class="fa-solid fa-file-pen"></i>
                  </v-btn>

                  <v-btn variant="text" class="text-red">
                    <i class="fa-solid fa-trash"></i>
                  </v-btn>
                </td>
              </tr>
            </tbody>
          </v-table>
        </v-card>
      </v-col>
    </v-row>
  </v-main>
  <!-- dialog view -->
  <v-dialog v-model="dialogview" width="auto">
    <v-card>
      <v-toolbar
        class="text-center text-white"
        color="#00D1FF"
        title="VIEW OUT PARTNER"
      ></v-toolbar>
      <v-card-text>
        <v-container>
          <v-row class="d-flex align-center">
            <v-col cols="2" class="dialogidunderline">
              <v-list-subheader>ID : </v-list-subheader>
            </v-col>
            <v-col cols="9" sm="9" md="9" class="dialogtitleunderline">
              <v-text-field
                variant="Plain"
                model-value="2"
                single-line
                hide-details
                readonly
              ></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Name : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <v-text-field variant="Plain" readonly></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Website : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <v-text-field variant="Plain" readonly></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Date Create : </v-list-subheader>
            </v-col>
            <v-col cols="9" sm="9" md="9">
              <input type="date" name="date" />
            </v-col>
            <v-col
              class="d-flex justify-center align-center fileinsert"
              cols="12"
              sm="12"
              md="12"
            >
              <img :src="app_url + '/images/01.jpg'" alt="" />
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
    </v-card>
  </v-dialog>
  <!-- dialog view END -->
  <!-- dialog edit -->
  <v-dialog v-model="dialogedit" width="auto">
    <v-card>
      <v-toolbar
        class="text-center text-white"
        color="#F9A825"
        title="EDIT OUT PARTNER"
      ></v-toolbar>
      <v-card-text>
        <v-container>
          <v-row class="d-flex align-center">
            <v-col cols="2">
              <v-list-subheader>ID : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <v-text-field variant="outlined" model-value="2" required> </v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Name : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <v-text-field variant="outlined" required></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Website : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <v-text-field variant="outlined" required></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Date Create : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <input type="date" name="date" />
            </v-col>
            <v-col
              class="d-flex justify-center align-center fileinsert"
              cols="12"
              sm="12"
              md="12"
            >
              <img :src="app_url + '/images/01.jpg'" alt="" />
              <label for="myImage"><i class="mdi mdi-image-plus-outline"></i></label>
              <input type="file" id="myImage" accept="image/png, image/gif, image/jpeg" />
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
      <v-card-actions class="d-flex justify-center align-center">
        <v-btn color="#F9A825" @click="dialogedit = false">
          <i class="fa-regular fa-xmark"></i>Cancle
        </v-btn>
        <v-btn color="#28A745" @click="dialogedit = false">
          <i class="fa-light fa-floppy-disk"></i>Save
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
  <!-- dialog edit END -->
</template>

<script>
export default {
  data() {
    return {
      dialoginsert: false,
      dialogview: false,
      dialogedit: false,
      desserts: [
        {
          id: 1,
          name: "บริษัท ปูนซิเมนต์ไทย จำกัด",
          website: "https://www.scg.com/",
        },
        {
          id: 2,
          name: "บริษัท ผลิตภัณฑ์และวัตถุก่อสร้าง จำกัด",
          website: "https://web.cpac.co.th/",
        },
        {
          id: 3,
          name: "บริษัท เชียงใหม่วีระวิศวการ จำกัด",
          website: "https://www.weerawissawakarn.com/",
        },
        {
          id: 4,
          name: "บริษัท ฮิตาชิ มหาชนจำกัด",
          website: "https://www.hitachi-homeappliances.com/th-th/",
        },
      ],
    };
  },
};
</script>

<style></style>
