console.log("All Entries");
getAllEntries();

async function getAllEntries1() {
  console.log("Get all entries");
  //TODO: Read out filter

  fetch(site + "api/entries.php", {
    method: "GET",
    headers: { "Content-Type": "application/json" },
  }).then((response) => {
    if (response.status === 200) {
      response.json().then((data) => {
        console.log(data);

        const entries = data.entries;
        const entriesDiv = document.getElementById("entries");
        entriesDiv.innerHTML = "";

        entries.forEach((entry) => {
          const entryDiv = document.createElement("div");
          entryDiv.innerHTML = `
                    <h2>${entry.title}</h2>
                    <p>${entry.date}</p>
                    <p>${entry.entry}</p>
                    `;
          entriesDiv.appendChild(entryDiv);
        });
      });
    }
  });
}

async function getAllEntries() {
  console.log("Get all entries");

  // Define the API endpoint
  const apiEndpoint = site + "api/entries.php";

  try {
    // Fetch data from the API
    const response = await fetch(apiEndpoint, {
      method: "GET",
      headers: { "Content-Type": "application/json" },
    });

    // Check if the response status is OK
    if (response.status === 200) {
      const data = await response.json();

      console.log(data);

      // Check if entries exist in the response
      if (data && Array.isArray(data)) {
        const entriesDiv = document.getElementById("entries");
        entriesDiv.innerHTML = ""; // Clear the current content

        // Iterate over the entries and render them
        data.forEach((entry) => {
          const entryDiv = document.createElement("div");
          entryDiv.innerHTML = `
              <div class="entry-card">
                <h2>${entry.title}</h2>
                <p><strong>Beschreibung:</strong> ${entry.description}</p>
                <p><strong>Standort:</strong> ${entry.place}</p>
                <p><strong>Priorität:</strong> ${entry.priority}</p>
                <p><strong>Gefahrenstufe:</strong> ${entry.danger}</p>
                <p><strong>Bild:</strong> <img src="${site}api/uploads?pic=${
            entry.picture
          }" alt="${
            entry.title
          }" style="max-width: 200px; max-height: 200px;"></p>
              </div>
            `;
          entriesDiv.appendChild(entryDiv);
        });
      } else {
        console.error("Invalid data format received from API:", data);
      }
    } else {
      console.error("Failed to fetch entries. Status:", response.status);
    }
  } catch (error) {
    console.error("An error occurred while fetching entries:", error);
  }
}
