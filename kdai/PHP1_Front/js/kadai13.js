//検索文字列の取得（入力テキストボックスの値）
const keyword = document.querySelector("input[name='keyword']");
const serchBtn = document.querySelector("input[type='submit']");
const productList = document.querySelector('#productList tbody');
const seachBox = document.querySelector('#seachBox');

serchBtn.addEventListener("click", (event) => {
    event.preventDefault();

    //API呼び出し関数
    searchList().then((res) => {

        //前回のデータを削除
        while (productList.rows.length > 0) {
            productList.deleteRow(0);
        }
        const resultCount = document.querySelector('#resultCount');
        if (resultCount != null) {
            resultCount.remove();
        }

        //JSONデータのコードに応じた処理
        if (res["code"] == 200) {
            displayResult(res["resultData"]);
        } else {
            displayError(res);
        }

    });

});

//検索文字列を付与してAPIに投げる関数
const searchList = async () => {
    const response = await fetch(
        `http://localhost:2009/kdai/kadai13_resource.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            keyword: keyword.value  // OKパターン
            // keywords: keyword.value // 404エラー確認用 
        })
    });

    //TODO:debug用
    console.log("ステータス：" + response.status);

    return response.json();
};

// 結果データ表示する関数
const displayResult = (result) => {
    //TODO:debug用
    console.log(result);
    //件数の表示
    seachBox.insertAdjacentHTML('afterend', `
            <div id="resultCount" class="input-group mb-3">
                <div class="col">
                    <p class="text-danger">
                        検索結果：${result.length}件
                    </p>
                </div>
            </div>
        `);

    result.forEach((data) => {
        productList.insertAdjacentHTML('beforeend', `
                <tr>
                    <td>${data["product_no"]}</td>
                    <td>${data["pname"]}</td>
                    <td>${data["category"]}</td>
                    <td>\\${data["price"]}</td>
                    
                </tr>
            `);
    });

};

//エラーメッセージを表示する関数
const displayError = (result) => {
    //TODO:debug用
    console.log(result);
    seachBox.insertAdjacentHTML('afterend', `
            <div id="resultCount" class="input-group mb-3">
                <div class="col">
                    <p class="text-danger">
                        [${result["code"]}]&nbsp;${result["message"]}：${result["description"]}
                    </p>
                </div>
            </div>
        `);
};