public class GalleryDetailFragment extends Fragment {
    private String title;
    private String subtitle;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        // Bundleから直接データを取得
        if (getArguments() != null) {
            title = getArguments().getString("title", "");
            subtitle = getArguments().getString("subtitle", "");
        }
    }

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater,
                           ViewGroup container, Bundle savedInstanceState) {
        View root = inflater.inflate(R.layout.fragment_gallery_detail, container, false);

        TextView titleText = root.findViewById(R.id.detailTitleText);
        TextView subtitleText = root.findViewById(R.id.detailSubtitleText);

        titleText.setText(title);
        subtitleText.setText(subtitle);

        return root;
    }
}