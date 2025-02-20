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
  // Define the base API endpoint
  const baseApiEndpoint = site + "api/entries.php";

  // Append current query parameters to the API endpoint
  const currentQueryParams = new URLSearchParams(window.location.search);
  const apiEndpoint = `${baseApiEndpoint}?${currentQueryParams.toString()}`;

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
        // data.forEach((entry) => {
        //   const entryDiv = document.createElement("div");
        //   entryDiv.innerHTML = `
        //       <div class="entry-card">
        //         <h2>${entry.title}</h2>
        //         <p><strong>Beschreibung:</strong> ${entry.description}</p>
        //         <p><strong>Standort:</strong> ${entry.place}</p>
        //         <p><strong>Priorität:</strong> ${entry.priority}</p>
        //         <p><strong>Gefahrenstufe:</strong> ${entry.danger}</p>
        //         <p><strong>Status:</strong> ${entry.status}</p>
        //         <p><strong>Bild:</strong> <img src="${entry.picture_data}" alt="${entry.picture}" style="max-width: 400px; max-height: 400px;"></p>
        //       </div>
        //     `;
        //   entriesDiv.appendChild(entryDiv);
        // });

        data.forEach((entry) => {
          const entryDiv = document.createElement("div");
          entryDiv.classList.add("col-md-4", "mb-4"); // Bootstrap grid column and spacing classes

          entryDiv.innerHTML = `
            <div class="card h-100">
              <img src="${entry.picture_data}" class="card-img-top" alt="${
            entry.picture
          }" style="max-height: 300px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title">${entry.title}</h5>
                <p class="card-text"><strong>Beschreibung:</strong> ${
                  entry.description
                }</p>
                <p class="card-text"><strong>Standort:</strong> ${
                  entry.place
                }</p>
                <p class="card-text"><strong>Priorität:</strong> ${
                  entry.priority
                }</p>
                <p class="card-text"><strong>Gefahrenstufe:</strong> ${
                  entry.danger
                }</p>
                <p class="card-text"><strong>Status:</strong> ${createStatusDropdown(
                  entry.id,
                  entry.status
                )}</p>
                <p id="${entry.id}-response"></p>
              </div>
            </div>
          `;

          entriesDiv.appendChild(entryDiv);
        });

        entriesLoaded();
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

function createStatusDropdown(id, value) {
  //Return html for dropdown
  return `
    <select class="form-select status" aria-label="Status" data-entry-id="${id}">
      <option value="1" ${value == null || value == 1 ? "selected" : ""}>Offen</option>
      <option value="2" ${
        value == 2 ? "selected" : ""
      }>In Bearbeitung</option>
      <option value="3" ${
        value == 3 ? "selected" : ""
      }>Geschlossen</option>
    </select>
  `;
}

//Event listener for status dropdown// Function to handle dropdown changes
function onDropdownChange(event) {
  if (event.target.classList.contains("status")) {
    console.log("Dropdown changed:", event.target.value);
    // Add your custom logic here
    const entryId = event.target.getAttribute("data-entry-id");
    const status = event.target.value;

    updateEntryStatus(entryId, status);
  }
}

// Listen for changes on the entire document
// This approach uses event delegation to handle dynamically added elements
document.addEventListener("change", function (event) {
  onDropdownChange(event);
});

function updateEntryStatus(entryId, status) {
  console.log("Update entry status", entryId, status);

  const data = {
    id: entryId,
    status: status,
  };

  //fetch post

  fetch(site + "api/status.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data),
  }).then((response) => {
    if (response.status === 200) {
      console.log("Status updated successfully");

      // Update the response message
      const responseElement = document.getElementById(`${entryId}-response`);
      responseElement.innerHTML = "<strong class='green'>Status erfolgreich aktualisiert</strong>";

      // Reload entries after status update
      // getAllEntries();
    } else {
      console.error("Failed to update status");
    }
  });
}

document.getElementById("apply-filters").addEventListener("click", function () {
  const searchText = document.getElementById("search-text").value;
  const searchPlace = document.getElementById("search-place").value;
  const priority = document.getElementById("priority").value;
  const danger = document.getElementById("danger").value;
  const order = document.getElementById("order").value;

  // Build query string
  const params = new URLSearchParams(window.location.search);
  if (searchText) {
    params.set("searchText", searchText);
  } else {
    params.delete("searchText");
  }

  if (searchPlace) {
    params.set("searchPlace", searchPlace);
  } else {
    params.delete("searchPlace");
  }

  if (priority && priority !== "All") {
    params.set("priority", priority);
  } else {
    params.delete("priority");
  }

  if(danger && danger !== "All") {
    params.set("danger", danger);
  } else {
    params.delete("danger");
  }

  if (order) {
    params.set("order", order);
  } else {
    params.delete("order");
  }

  // Reload page with new query string
  window.location.search = params.toString();
});

function entriesLoaded() {
  const params = new URLSearchParams(window.location.search);

  const searchText = params.get("searchText");
  const searchPlace = params.get("searchPlace");
  const priority = params.get("priority");
  const danger = params.get("danger");
  const order = params.get("order");

  if (searchText) {
    document.getElementById("search-text").value = searchText;
  }

  if (searchPlace) {
    document.getElementById("search-place").value = searchPlace;
  }

  if (priority) {
    document.getElementById("priority").value = priority;
  }

  if(danger) {
    document.getElementById("danger").value = danger;
  }

  if (order) {
    document.getElementById("order").value = order;
  }

  // Load pagination dynamically (placeholder logic)
  const paginationContainer = document.querySelector(".pagination");
  //reset pagination
  paginationContainer.innerHTML = "";

  const currentPage = parseInt(params.get("page") || 1);
  const entriesAvailable =
    document.getElementById("entries").children.length > 0;

  for (let i = 1; i <= currentPage + (entriesAvailable ? 1 : 0); i++) {
    const li = document.createElement("li");
    li.className = "page-item" + (i === currentPage ? " active" : "");

    const a = document.createElement("a");
    a.className = "page-link";
    a.textContent = i;
    a.href = `?${updateQueryParam("page", i)}`;

    li.appendChild(a);
    paginationContainer.appendChild(li);
  }
}

// Update query parameter helper
function updateQueryParam(key, value) {
  const params = new URLSearchParams(window.location.search);
  params.set(key, value);
  return params.toString();
}
