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
    const auth = btoa("ecc_php:fG8^qDPEkQ*Ie7b1Qeid"); // Basic認証用（ハードコーディング良くない！けど今回はこのままで。）
    const response = await fetch(`https://click.ecc.ac.jp/~t_mori/php1/kadai13_resource_click.php`, {
        method: "POST",
        headers: {
            "Authorization": `Basic ${auth}`,
            "Content-Type": "application/json"

        },
        body: JSON.stringify({
            keyword: keyword.value
        })
    });

    return response.json();
};

// 結果データ表示する関数
const displayResult = (result) => {
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
                    <td>${data["PRODUCT_NO"]}</td>
                    <td>${data["PNAME"]}</td>
                    <td>${data["CATEGORY"]}</td>
                    <td>\\${data["PRICE"]}</td>
                    
                </tr>
            `);
    });

};

//エラーメッセージを表示する関数
const displayError = (result) => {
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