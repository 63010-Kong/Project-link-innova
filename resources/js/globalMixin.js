export default {
  data() {
    return {
      app_url: process.env.APP_URL,
      api_url: process.env.API_URL,
      // admin_url: process.env.APP_URL,
    };
  },
  methods: {
    dateFormat(date, new_format) {
      if (date === undefined) {
        return 'N/A';
      } else if (date == null) {
        return '-';
      }
      return moment(date, 'YYYY-MM-DD HH:mm:ss').format(new_format);
    },
    dateThaiFormat(date_str, with_time = false, is_buddhist_era = false) {
      if (date_str === undefined) {
        return 'N/A';
      } else if (date_str == null) {
        return '-';
      }

      let date = moment(date_str, 'YYYY-MM-DD HH:mm:ss');
      let month = date.month();
      let month_th = '';
      switch (month) {
        case 0: month_th = 'มกราคม'; break;
        case 1: month_th = 'กุมภาพันธ์'; break;
        case 2: month_th = 'มีนาคม'; break;
        case 3: month_th = 'เมษายน'; break;
        case 4: month_th = 'พฤษภาคม'; break;
        case 5: month_th = 'มิถุนายน'; break;
        case 6: month_th = 'กรกฎาคม'; break;
        case 7: month_th = 'สิงหาคม'; break;
        case 8: month_th = 'กันยายน'; break;
        case 9: month_th = 'ตุลาคม'; break;
        case 10: month_th = 'พฤศจิกายน'; break;
        case 11: month_th = 'ธันวาคม'; break;
        default: month_th = ''; break;
      }

      let year = (is_buddhist_era) ? 'พ.ศ.' + (date.year() + 543) : date.year();
      if (with_time) {
        return date.date() + ' ' + month_th + ' ' + year + ', ' + date.hour() + ':' + ('0' + date.minute()).slice(-2) + ' น.';
      } else {
        return date.date() + ' ' + month_th + ' ' + year;
      }
    },
  }
}
