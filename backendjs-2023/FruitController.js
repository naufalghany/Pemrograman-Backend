// import data
const fruits = require('./data.js');

// menampilkan semua data
const index = () => {
    for (const fruit of fruits) {
        console.log(fruit);
    }
}

// menambahkan data
const store = (name) => {
    fruits.push(name)

    console.log(`menambahkan data ${name}`)
    index()
}

// export method
module.exports = {index, store}