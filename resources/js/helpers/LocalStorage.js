export const getObjects = () => {//traer todo del localStorage 
	let data = []
	for (let i = 0; i < localStorage.length; i++) {
		if (localStorage.key(i) != 'invoiceTotal') {
			let clave = localStorage.key(i)
			let itemData = localStorage.getItem(clave)

			let obj = JSON.parse(itemData)

			data.push(obj)
		}
	}
	return data
}

export const deleteObject = idProduct => { //borrar 1 elemento del localstorage
	localStorage.removeItem(idProduct)
}

export const addObject = (objProduct) => {//agregar 1 solo elemento
	localStorage.setItem(objProduct.id, JSON.stringify(objProduct))
}
export const totalAddObject = (objName) => {
	localStorage.setItem('invoiceTotal', objName)
}

export const getObject = index => {//trae solo 1 elemento
	let item = JSON.parse(localStorage.getItem(index))
	return item
}

export const addTotal = () => { // agregar el precio total
	let total = 0
	for (let i = 0; i < localStorage.length; i++) {
		if (localStorage.key(i) != 'invoiceTotal') {
			let clave = localStorage.key(i)
			let itemData = localStorage.getItem(clave)

			let obj = JSON.parse(itemData)

			total += obj.subtotal

			if (total<100) {
				total += obj.shipping_cost
			}

		}
	}
	totalAddObject(total)
	return total
}