public class GalleryFragment extends Fragment {
    private GalleryViewModel galleryViewModel;
    private RecyclerView recyclerView;
    private CardAdapter adapter;

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater,
                           ViewGroup container, Bundle savedInstanceState) {
        View root = inflater.inflate(R.layout.fragment_gallery, container, false);

        galleryViewModel = new ViewModelProvider(this).get(GalleryViewModel.class);

        recyclerView = root.findViewById(R.id.recyclerView);
        recyclerView.setLayoutManager(new GridLayoutManager(getContext(), 2));
        
        adapter = new CardAdapter(new CardAdapter.OnItemClickListener() {
            @Override
            public void onItemClick(CardItem item) {
                // Bundleを使用してデータを渡す
                Bundle args = new Bundle();
                args.putString("title", item.getTitle());
                args.putString("subtitle", item.getSubtitle());
        
                // Navigation Componentを使用して遷移
                Navigation.findNavController(requireView())
                 .navigate(R.id.action_gallery_to_detail, args);
            }
        });
        
        recyclerView.setAdapter(adapter);

        galleryViewModel.getItems().observe(getViewLifecycleOwner(), items -> {
            adapter.setItems(items);
        });

        return root;
    }
}