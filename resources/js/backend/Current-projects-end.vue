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
            title="INSERT INTO CURRENT PROJECTS"
          ></v-toolbar>
          <v-card-text>
            <v-container>
              <v-row class="d-flex align-center">
                <v-col cols="2">
                  <v-list-subheader>Title : </v-list-subheader>
                </v-col>
                <v-col cols="10" sm="10" md="10">
                  <v-text-field variant="outlined" required></v-text-field>
                </v-col>
                <v-col cols="2">
                  <v-list-subheader>Video Name : </v-list-subheader>
                </v-col>
                <v-col cols="10" sm="10" md="10">
                  <v-text-field variant="outlined" required></v-text-field>
                </v-col>
                <v-col cols="2">
                  <v-list-subheader>Description : </v-list-subheader>
                </v-col>
                <v-col cols="10" sm="10" md="10">
                  <v-textarea variant="outlined" required></v-textarea>
                </v-col>
                <v-col cols="2">
                  <v-list-subheader>YouTube Link : </v-list-subheader>
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
                <th>Title</th>
                <th>Video Name</th>
                <th class="text-center" width="250px">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in desserts" :key="item.id">
                <td class="text-center">{{ item.id }}</td>
                <td>{{ item.title }}</td>
                <td>{{ item.videoname }}</td>
                <td class="text-center">
                  <v-btn variant="text" class="text-blue" @click="dialogview = true,getDetail(item.id)">
                    <i class="fa-solid fa-eye"></i>
                  </v-btn>

                  <v-btn
                    variant="text"
                    class="text-yellow-darken-3 mx-3"
                    @click="dialogedit = true,getDetail(item.id)"
                  >
                    <i class="fa-solid fa-file-pen"></i>
                  </v-btn>

                  <v-btn variant="text" class="text-red" @click="deleteDetail(item.id,item.title)">
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
        title="VIEW CURRENT PROJECTS"
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
              <v-list-subheader>Title : </v-list-subheader>
            </v-col>
            <v-col cols="9" sm="9" md="9">
              <v-text-field
                variant="Plain"
                model-value="อาคาร"
                single-line
                hide-details
                readonly
              ></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Video Name : </v-list-subheader>
            </v-col>
            <v-col cols="9" sm="9" md="9">
              <v-text-field
                variant="Plain"
                model-value="....."
                single-line
                hide-details
                readonly
              ></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Description : </v-list-subheader>
            </v-col>
            <v-col cols="9" sm="9" md="9">
              <v-textarea
                variant="Plain"
                model-value="......"
                single-line
                hide-details
                readonly
              ></v-textarea>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>YouTube Link : </v-list-subheader>
            </v-col>
            <v-col cols="9" sm="9" md="9">
              <v-text-field
                variant="Plain"
                model-value="......"
                single-line
                hide-details
                readonly
              ></v-text-field>
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
        title="EDIT CURRENT PROJECTS"
      ></v-toolbar>
      <v-card-text>
        <v-container>
          <v-row class="d-flex align-center">
            <v-col cols="2">
              <v-list-subheader>ID : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <v-text-field variant="outlined" model-value="2"></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Title : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <v-text-field variant="outlined" model-value="อาคาร"></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Video Name : </v-list-subheader>
            </v-col>
            <v-col cols="9" sm="9" md="9">
              <v-text-field
                variant="outlined"
                model-value="....."
                single-line
                hide-details
                readonly
              ></v-text-field>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>Description : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <v-textarea
                variant="outlined"
                model-value="The Woodman set to work at once, and so sharp was his axe that the tree was soon chopped nearly through."
              ></v-textarea>
            </v-col>
            <v-col cols="2">
              <v-list-subheader>YouTube Link : </v-list-subheader>
            </v-col>
            <v-col cols="10" sm="10" md="10">
              <v-text-field variant="outlined" model-value="......"></v-text-field>
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
          title: "โครงการก่อสร้างอาคารสำนักงานธนาคารออมสินสาขาสุโขทัย",
          videoname: "",
        },
        {
          id: 2,
          title: "โครงการก่อสร้างอาคารเรียนรวม และเอนกประสงค์ แม่สอด ",
          videoname: "",
        },
        {
          id: 3,
          title: "โครงการก่อสร้างอาคารผู้โดยสารขาออกท่าอากาศยานนานาชาติ จ.ภูเก็ต",
          videoname: "",
        },
        {
          id: 4,
          title: "โครงการก่อสร้างอาคารนวัตกรรมศึกษา",
          videoname: "",
        },
        {
          id: 5,
          title: "โครงการก่อสร้างสำนักงานคดีปกครองเชียงใหม่",
          videoname: "",
        },
        {
          id: 6,
          title: "โครงการก่อสร้างอาคารสำนักงานคุมประพฤติ พร้อมสิ่งก่อสร้างประกอบ",
          videoname: "",
        },
        {
          id: 7,
          title: "โครงการก่อสร้างโรงเรียนหนองอาบช้าง",
          videoname: "",
        },
        {
          id: 8,
          title: "โครงการก่อสร้างอาคารพัฒนาสมองร่างกาย และพฤติกรรมของเด็กด้อยโอกาส",
          videoname: "",
        },
      ],
    };
  },
};
</script>

<style></style>
