module.exports = {
  tydUnique: () => {
    Array.prototype.unique = function () {
      if (!this.length) {
        console.log("Unique Array Should Not Be Empty, Returning Empty Array Anyway ..");
        return [];
      }
      if (typeof this != "object") throw new Error("Unique Fucntion Must Recieve Type Of Array");
      return [...new Set(this)];
    };
  },

  tydLinearSearch: () => {
    Array.prototype.linearSearch = function (target) {
      let values = this;
      let result = [];
      for (let i = 0; i < values.length; i++) {
        if (values[i] == target) result.push(i);
      }
      return result;
    };
  },

  tydBinarySearch: () => {
    Array.prototype.binarySearch = function (target) {
      let sortedArray = this.sort((a, b) => {
        return a - b;
      });

      let lowIndex = 0;
      let highIndex = sortedArray.length - 1;
      while (lowIndex <= highIndex) {
        var mid = Math.floor((lowIndex + highIndex) / 2);
        if (sortedArray[mid] < target) {
          lowIndex = mid + 1;
        } else if (sortedArray[mid] > target) {
          highIndex = mid - 1;
        } else {
          return true;
        }
      }
      return false;
    };
  },

  tydSelectionSort: function () {
    Array.prototype.selectionSort = function () {
      let arr = this;
      for (let i = 0; i < arr.length; i++) {
        let temp = 0;
        let tempCord = 0;
        let smaller = Infinity;
        // Search Smaller Number
        for (let j = i; j < arr.length; j++) {
          if (arr[j] < smaller) {
            smaller = arr[j];
            tempCord = j;
          }
        }
        // Repositioning
        if (arr[i] > smaller) {
          temp = arr[i];
          arr[i] = arr[tempCord];
          arr[tempCord] = temp;
        }
      }
      return arr;
    };
  },

  tydDictionarySort: function () {
    Array.prototype.dictionarySort = function () {
      let dictionaries = this;
      let temp = Infinity;
      for (let i = 0; i < dictionaries.length; i++) {
        for (let j = i; j < dictionaries.length; j++) {
          if (dictionaries[j] < dictionaries[i]) {
            temp = dictionaries[j];
            dictionaries[j] = dictionaries[i];
            dictionaries[i] = temp;
          }
        }
      }
      return dictionaries;
    };
  },
};
