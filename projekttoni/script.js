fetch("https://api.covid19tracker.ca/summary/split").then((data)=>{
	/* console.log(data); */
	return data.json();
}).then((objectData)=>{
console.log(objectData.data[0].province);
	let tableData="";
	objectData.data.map((values)=>{
		tableData+=` <tr>
	  <td>${values.province}</td>
	  <td>${values.date}</td>
	  <td>${values.total_cases}</td>
	  <td>${values.total_fatalities}</td>
	  <td>${values.total_tests}</td>
	  <td>${values.total_vaccinations}</td>
    </tr>`;
	});
	document.getElementById("table_body")
	.innerHTML=tableData;
})