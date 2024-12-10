// GalleryViewModel.java
public class GalleryViewModel extends ViewModel {
    private MutableLiveData<List<CardItem>> items;

    public GalleryViewModel() {
        items = new MutableLiveData<>();
        loadItems();
    }

    public LiveData<List<CardItem>> getItems() {
        return items;
    }

    private void loadItems() {
        // サンプルデータ
        List<CardItem> cardItems = new ArrayList<>();
        cardItems.add(new CardItem("タイトル 1", "サブタイトル 1"));
        cardItems.add(new CardItem("タイトル 2", "サブタイトル 2"));
        cardItems.add(new CardItem("タイトル 3", "サブタイトル 3"));
        cardItems.add(new CardItem("タイトル 4", "サブタイトル 4"));
        items.setValue(cardItems);
    }
}