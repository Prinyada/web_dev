async function getDataFromAPI() {
  let response = await fetch(
    "https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province.json"
  );
  let rawData = await response.text(); // อ่านผลลัพธ์
  let objectData = JSON.parse(rawData); // แปลผลลัพธ์เป็น object
  let province = document.getElementById("province"); // ดึง <ul> เพื่อใช้ในการเพิ่มแท็ก <li>

  for (let i = 0; i < 77; i++) {
    let content = objectData[i].name_th; // ดึงข้อมูลจาก object
    let option = document.createElement("option"); // สร้างแท็ก <option>
    // option.innerHTML = content // น าข้อมูลทจี่ ดัแล้วมาไว้ในแทก็ก <option>
    option.text = content;
    option.value = content;
    province.appendChild(option); // เพิ่มแท็ก <option> ใหม่
  }
}
getDataFromAPI(); // เรียกฟังก์ชัน
