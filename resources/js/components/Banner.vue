<template>
  <v-carousel hide-delimiters cycle class="banner" height="700px" hide-delimiter-background show-arrows="hover">
    <v-carousel-item height="100%" class="d-flex fill-height justify-center align-end" v-for="(slide, i) in slides"
      :key="i" :src="app_url + images[i]" cover>
      <div class="d-flex fill-height justify-center align-end">
        <v-card-title class="mx-auto mb-5 bg-text">
          <div class="w-100">
            <p>{{ title[i] }}</p>
            <p v-if="subtitle[i] != ''">{{ subtitle[i] }}</p>
          </div>
        </v-card-title>
      </div>
    </v-carousel-item>
  </v-carousel>
</template>

<script>
export default {
  data() {
    return {
      title: [
        "Hilltania Condominium ฮิลทาเนีย คอนโดมิเนียม",
        "อาคารอำนวยการผู้ป่วยนอก และอุบัติเหตุฉุกเฉิน 11 ชั้น",
        "ท่าอากาศยานนานาชาติเบตง",
        "อาคารศูนย์บริการโรคหัวใจ มะเร็ง และวินิจฉัยรักษา",
      ],
      subtitle: [
        "ฮิลทาเนีย คอนโดมิเนียม",
        "โรงพยาบาลราชบุรี",
        "betong international airport",
        "โรงพยาบาลสระบุรี",
      ],
      slides: ["baner1", "baner2", "baner3", "baner4"],
      images: [
        "/images/banner/banner1.png",
        "/images/banner/banner2.png",
        "/images/banner/banner3.png",
        "/images/banner/banner4.png",
      ],
    };
  },
};
</script>
