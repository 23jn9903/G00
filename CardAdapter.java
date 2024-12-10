public class CardAdapter extends RecyclerView.Adapter<CardAdapter.ViewHolder> {
    private List<CardItem> items = new ArrayList<>();
    private final OnItemClickListener listener;

    public interface OnItemClickListener {
        void onItemClick(CardItem item);
    }

    public CardAdapter(OnItemClickListener listener) {
        this.listener = listener;
    }

    public void setItems(List<CardItem> items) {
        this.items = items;
        notifyDataSetChanged();
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext())
            .inflate(R.layout.item_card, parent, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        CardItem item = items.get(position);
        holder.bind(item, listener);
    }

    @Override
    public int getItemCount() {
        return items.size();
    }

    static class ViewHolder extends RecyclerView.ViewHolder {
        private final TextView titleText;
        private final TextView subtitleText;
        private final MaterialCardView cardView;

        ViewHolder(View view) {
            super(view);
            titleText = view.findViewById(R.id.titleText);
            subtitleText = view.findViewById(R.id.subtitleText);
            cardView = (MaterialCardView) itemView;
        }

        void bind(final CardItem item, final OnItemClickListener listener) {
            titleText.setText(item.getTitle());
            subtitleText.setText(item.getSubtitle());
            
            cardView.setOnClickListener(v -> listener.onItemClick(item));
        }
    }
}