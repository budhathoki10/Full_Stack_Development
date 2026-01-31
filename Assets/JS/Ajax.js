let search = document.getElementById("search");
let table = document.getElementById("table");
search.addEventListener("input", (e) => {
  const queries = e.target.value;
  fetch("../Public/searchMovies.php?query=" + queries)
    .then((response) => response.json())
    .then((movie) => {
      let rows = `
    <tr>
                <th>Movie Name</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Cast</th>
            <th>Rating</th>   
            ${movie.isAdmin ? "<th>Actions</th>" : ""}  
            </tr>
    `;

      movie.Movies.forEach((movies) => {
        rows += `
        <tr>
        <td>${movies.Moviename}</td>
        <td>${movies.year}</td>
        <td>${movies.genres}</td>
        <td>${movies.cast}</td>
        <td>${movies.rating}</td>
      ${
        movie.isAdmin
          ? `
       <td>
                        <a href="edit.php?id=${movies.id}"> <i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                        <a href="delete.php?id=${movies.id}" onclick="return confirm('Do you Really want to delete this movie')"><i class="fa-solid fa-trash"></i></i></i> Delete</a>
                    </td> `
          : ""
      }
  `;
      });
      table.innerHTML = rows;
    });
});
